<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('create_test_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="CreateTest" format="csv" />
                <livewire:excel-export model="CreateTest" format="xlsx" />
                <livewire:excel-export model="CreateTest" format="pdf" />
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
                            {{ trans('cruds.createTest.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.instruction') }}
                            @include('components.table.sort', ['field' => 'instruction'])
                        </th>

                        <th>
                            {{'Duration(in minutes)' }}
                        </th>

                        <th>
                            {{ trans('cruds.createTest.fields.video_url') }}
                            @include('components.table.sort', ['field' => 'video_url'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.related_question_paper') }}
                            @include('components.table.sort', ['field' => 'related_question_paper.question_paper_name'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.valid_from') }}
                            @include('components.table.sort', ['field' => 'valid_from'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.valid_to') }}
                            @include('components.table.sort', ['field' => 'valid_to'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.related_class') }}
                            @include('components.table.sort', ['field' => 'related_class.class_name'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.related_test_type') }}
                            @include('components.table.sort', ['field' => 'related_test_type.test_name'])
                        </th>
{{--                        <th>--}}
{{--                            {{ trans('cruds.createTest.fields.max_student_join') }}--}}
{{--                            @include('components.table.sort', ['field' => 'max_student_join'])--}}
{{--                        </th>--}}
                        <th>
                            {{ trans('cruds.createTest.fields.maximum_score') }}
                            @include('components.table.sort', ['field' => 'maximum_score'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.minimum_score') }}
                            @include('components.table.sort', ['field' => 'minimum_score'])
                        </th>
                        <th>
                            {{ trans('cruds.createTest.fields.inactive') }}
                            @include('components.table.sort', ['field' => 'inactive'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($createTests as $createTest)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $createTest->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $createTest->id }}
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $createTest->id }}">
                                    @php
                                        $truncatedContent = str_word_count($createTest->instruction, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $createTest->id }}')">Read More</p>
                            </td>
                            <td>
                                {{ $createTest->udf_1 }}
                            <td>
                                {{ $createTest->video_url }}
                            </td>
                            <td>
                                @if($createTest->relatedQuestionPaper)
                                    <span class="badge badge-relationship">{{ $createTest->relatedQuestionPaper->question_paper_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $createTest->valid_from }}
                            </td>
                            <td>
                                {{ $createTest->valid_to }}
                            </td>
                            <td>
                                @if($createTest->relatedClass)
                                    <span class="badge badge-relationship">{{ $createTest->relatedClass->class_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($createTest->relatedTestType)
                                    <span class="badge badge-relationship">{{ $createTest->relatedTestType->test_name ?? '' }}</span>
                                @endif
                            </td>
{{--                            <td>--}}
{{--                                {{ $createTest->max_student_join }}--}}
{{--                            </td>--}}
                            <td>
                                {{ $createTest->maximum_score }}
                            </td>
                            <td>
                                {{ $createTest->minimum_score }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $createTest->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('create_test_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.create-tests.show', $createTest) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('create_test_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.create-tests.edit', $createTest) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('create_test_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $createTest->id }})" wire:loading.attr="disabled">
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
            {{ $createTests->links() }}
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