<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('question_paper_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="QuestionPaper" format="csv" />
                <livewire:excel-export model="QuestionPaper" format="xlsx" />
                <livewire:excel-export model="QuestionPaper" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                <tr>
                    <th class="w-9">
                    </th>
                    <th class="w-28">
                        {{ trans('cruds.questionPaper.fields.id') }}
                        @include('components.table.sort', ['field' => 'id'])
                    </th>
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionPaper.fields.related_class') }}--}}
                    {{--                            @include('components.table.sort', ['field' => 'related_class.class_name'])--}}
                    {{--                        </th>--}}
                    <th>
                        {{ trans('cruds.questionPaper.fields.related_test') }}
                        @include('components.table.sort', ['field' => 'related_test.test_name'])
                    </th>
                    <th>
                        {{ trans('cruds.questionPaper.fields.related_ability') }}{{' : Click On Ability To Add Question'}}
                    </th>
                    <th>
                        {{ trans('cruds.questionPaper.fields.question_paper_name') }}
                        @include('components.table.sort', ['field' => 'question_paper_name'])
                    </th>
                    <th>
                        {{ trans('cruds.questionPaper.fields.inactive') }}
                        @include('components.table.sort', ['field' => 'inactive'])
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($questionPapers as $questionPaper)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $questionPaper->id }}" wire:model="selected">
                        </td>
                        <td>
                            {{ $questionPaper->id }}
                        </td>
                        {{--                            <td>--}}
                        {{--                                @if($questionPaper->relatedClass)--}}
                        {{--                                    <span class="badge badge-relationship">{{ $questionPaper->relatedClass->class_name ?? '' }}</span>--}}
                        {{--                                @endif--}}
                        {{--                            </td>--}}
                        <td>
                            @if($questionPaper->relatedTest)
                                <span class="badge badge-relationship">{{ $questionPaper->relatedTest->test_name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @foreach($questionPaper->relatedAbility as $key => $entry)
                                <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.question-banks.create',"qid=".$questionPaper->id."&aid=".$entry->id) }}">
                                    <span class="badge badge-relationship">{{ $entry->ability_name }}</span>
                                </a>
                            @endforeach
                        </td>
                        <td>
                            {{ $questionPaper->question_paper_name }}
                        </td>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $questionPaper->inactive ? 'checked' : '' }}>
                        </td>
                        <td>
                            <div class="flex justify-end">
                                @can('question_paper_show')
                                    <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.question-papers.show', $questionPaper) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('question_paper_edit')
                                    <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.question-papers.edit', $questionPaper) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('question_paper_delete')
                                    <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $questionPaper->id }})" wire:loading.attr="disabled">
                                        {{ trans('global.delete') }}
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No entries found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $questionPapers->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
            if (!confirm("{{ trans('global.areYouSure') }}")) {
                return
            }
        @this[e.callback](...e.argv)
        })
    </script>
@endpush