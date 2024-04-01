<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('question_bank_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="QuestionBank" format="csv" />
                <livewire:excel-export model="QuestionBank" format="xlsx" />
                <livewire:excel-export model="QuestionBank" format="pdf" />
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
                        {{ trans('cruds.questionBank.fields.id') }}
                        @include('components.table.sort', ['field' => 'id'])
                    </th>
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.related_class_name') }}--}}
                    {{--                            @include('components.table.sort', ['field' => 'related_class_name.class_name'])--}}
                    {{--                        </th>--}}
                    <th>
                        {{ trans('cruds.questionBank.fields.related_test_type') }}
                        @include('components.table.sort', ['field' => 'related_test_type.test_name'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.related_ability') }}
                        @include('components.table.sort', ['field' => 'related_ability.ability_name'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.related_question_paper') }}
                        @include('components.table.sort', ['field' => 'related_question_paper.question_paper_name'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.question_text') }}
                        @include('components.table.sort', ['field' => 'question_text'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.question_url') }}
                        @include('components.table.sort', ['field' => 'question_url'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.choice_1') }}
                        @include('components.table.sort', ['field' => 'choice_1'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.choice_2') }}
                        @include('components.table.sort', ['field' => 'choice_2'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.choice_3') }}
                        @include('components.table.sort', ['field' => 'choice_3'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.choice_4') }}
                        @include('components.table.sort', ['field' => 'choice_4'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.choice_5') }}
                        @include('components.table.sort', ['field' => 'choice_5'])
                    </th>
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.choice_6') }}--}}
                    {{--                            @include('components.table.sort', ['field' => 'choice_6'])--}}
                    {{--                        </th>--}}
                    <th>
                        {{ trans('cruds.questionBank.fields.right_choice') }}
                        @include('components.table.sort', ['field' => 'right_choice'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.score_right') }}
                        @include('components.table.sort', ['field' => 'score_right'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.score_wrong') }}
                        @include('components.table.sort', ['field' => 'score_wrong'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.order_no') }}
                        @include('components.table.sort', ['field' => 'order_no'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.question_image') }}
                    </th>
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.choice_1_image') }}--}}
                    {{--                        </th>--}}
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.choice_2_image') }}--}}
                    {{--                        </th>--}}
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.choice_3_image') }}--}}
                    {{--                        </th>--}}
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.choice_4_image') }}--}}
                    {{--                        </th>--}}
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.choice_5_image') }}--}}
                    {{--                        </th>--}}
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.choice_6_image') }}--}}
                    {{--                        </th>--}}
                    {{--                        <th>--}}
                    {{--                            {{ trans('cruds.questionBank.fields.right_choice_image') }}--}}
                    {{--                        </th>--}}
                    <th>
                        {{ trans('cruds.questionBank.fields.example_question') }}
                        @include('components.table.sort', ['field' => 'example_question'])
                    </th>
                    <th>
                        {{ trans('cruds.questionBank.fields.inactive') }}
                        @include('components.table.sort', ['field' => 'inactive'])
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($questionBanks as $questionBank)
                    <tr>
                        <td>
                            <div class="flex justify-end">
                                @can('question_bank_show')
                                    <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.question-banks.show', $questionBank) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('question_bank_edit')
                                    <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.question-banks.edit', $questionBank) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('question_bank_delete')
                                    <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $questionBank->id }})" wire:loading.attr="disabled">
                                        {{ trans('global.delete') }}
                                    </button>
                                @endcan
                            </div>
                        </td>
                        <td>
                            {{ $questionBank->id }}
                        </td>
                        {{--                            <td>--}}
                        {{--                                @if($questionBank->relatedClassName)--}}
                        {{--                                    <span class="badge badge-relationship">{{ $questionBank->relatedClassName->class_name ?? '' }}</span>--}}
                        {{--                                @endif--}}
                        {{--                            </td>--}}
                        <td>
                            @if($questionBank->relatedTestType)
                                <span class="badge badge-relationship">{{ $questionBank->relatedTestType->test_name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @if($questionBank->relatedAbility)
                                <span class="badge badge-relationship">{{ $questionBank->relatedAbility->ability_name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @if($questionBank->relatedQuestionPaper)
                                <span class="badge badge-relationship">{{ $questionBank->relatedQuestionPaper->question_paper_name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $questionBank->question_text }}
                        </td>
                        <td>
                            {{ $questionBank->question_url }}
                        </td>
                        <td>
                            {{ $questionBank->choice_1 }}
                        </td>
                        <td>
                            {{ $questionBank->choice_2 }}
                        </td>
                        <td>
                            {{ $questionBank->choice_3 }}
                        </td>
                        <td>
                            {{ $questionBank->choice_4 }}
                        </td>
                        <td>
                            {{ $questionBank->choice_5 }}
                        </td>
                        {{--                            <td>--}}
                        {{--                                {{ $questionBank->choice_6 }}--}}
                        {{--                            </td>--}}
                        <td>
                            {{ $questionBank->right_choice }}
                        </td>
                        <td>
                            {{ $questionBank->score_right }}
                        </td>
                        <td>
                            {{ $questionBank->score_wrong }}
                        </td>
                        <td>
                            {{ $questionBank->order_no }}
                        </td>
                        <td>
                            @foreach($questionBank->question_image as $key => $entry)
                                <a class="link-light-blue" href="{{ $entry['url'] }}">
                                    <i class="far fa-file">
                                    </i>
                                    {{ $entry['file_name'] }}
                                </a>
                            @endforeach
                        </td>
                        {{--                            <td>--}}
                        {{--                                @foreach($questionBank->choice_1_image as $key => $entry)--}}
                        {{--                                    <a class="link-light-blue" href="{{ $entry['url'] }}">--}}
                        {{--                                        <i class="far fa-file">--}}
                        {{--                                        </i>--}}
                        {{--                                        {{ $entry['file_name'] }}--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                @foreach($questionBank->choice_2_image as $key => $entry)--}}
                        {{--                                    <a class="link-light-blue" href="{{ $entry['url'] }}">--}}
                        {{--                                        <i class="far fa-file">--}}
                        {{--                                        </i>--}}
                        {{--                                        {{ $entry['file_name'] }}--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                @foreach($questionBank->choice_3_image as $key => $entry)--}}
                        {{--                                    <a class="link-light-blue" href="{{ $entry['url'] }}">--}}
                        {{--                                        <i class="far fa-file">--}}
                        {{--                                        </i>--}}
                        {{--                                        {{ $entry['file_name'] }}--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                @foreach($questionBank->choice_4_image as $key => $entry)--}}
                        {{--                                    <a class="link-light-blue" href="{{ $entry['url'] }}">--}}
                        {{--                                        <i class="far fa-file">--}}
                        {{--                                        </i>--}}
                        {{--                                        {{ $entry['file_name'] }}--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                @foreach($questionBank->choice_5_image as $key => $entry)--}}
                        {{--                                    <a class="link-light-blue" href="{{ $entry['url'] }}">--}}
                        {{--                                        <i class="far fa-file">--}}
                        {{--                                        </i>--}}
                        {{--                                        {{ $entry['file_name'] }}--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                @foreach($questionBank->choice_6_image as $key => $entry)--}}
                        {{--                                    <a class="link-light-blue" href="{{ $entry['url'] }}">--}}
                        {{--                                        <i class="far fa-file">--}}
                        {{--                                        </i>--}}
                        {{--                                        {{ $entry['file_name'] }}--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                @foreach($questionBank->right_choice_image as $key => $entry)--}}
                        {{--                                    <a class="link-light-blue" href="{{ $entry['url'] }}">--}}
                        {{--                                        <i class="far fa-file">--}}
                        {{--                                        </i>--}}
                        {{--                                        {{ $entry['file_name'] }}--}}
                        {{--                                    </a>--}}
                        {{--                                @endforeach--}}
                        {{--                            </td>--}}
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $questionBank->example_question ? 'checked' : '' }}>
                        </td>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $questionBank->inactive ? 'checked' : '' }}>
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
            {{ $questionBanks->links() }}
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