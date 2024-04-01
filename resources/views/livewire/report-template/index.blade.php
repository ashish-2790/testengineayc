<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('report_template_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

{{--            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))--}}
{{--                <livewire:excel-export model="ReportTemplate" format="csv" />--}}
{{--                <livewire:excel-export model="ReportTemplate" format="xlsx" />--}}
{{--                <livewire:excel-export model="ReportTemplate" format="pdf" />--}}
{{--            @endif--}}




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
                            {{ trans('cruds.reportTemplate.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.related_class_name') }}
                            @include('components.table.sort', ['field' => 'related_class_name.class_name'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.related_test_name') }}
                            @include('components.table.sort', ['field' => 'related_test_name.test_name'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.related_ability_name') }}
                            @include('components.table.sort', ['field' => 'related_ability_name.ability_name'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.test_sten_score_from') }}
                            @include('components.table.sort', ['field' => 'test_sten_score_from'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.test_sten_score_to') }}
                            @include('components.table.sort', ['field' => 'test_sten_score_to'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.short_review') }}
                            @include('components.table.sort', ['field' => 'short_review'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.report_1') }}
                            @include('components.table.sort', ['field' => 'report_1'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.report_2') }}
                            @include('components.table.sort', ['field' => 'report_2'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.report_3') }}
                            @include('components.table.sort', ['field' => 'report_3'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.report_4') }}
                            @include('components.table.sort', ['field' => 'report_4'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.report_5') }}
                            @include('components.table.sort', ['field' => 'report_5'])
                        </th>
                        <th>
                            {{ trans('cruds.reportTemplate.fields.report_6') }}
                            @include('components.table.sort', ['field' => 'report_6'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reportTemplates as $reportTemplate)
                        <tr>
                            <td>
                                <div class="flex justify-end">
                                    @can('report_template_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.report-templates.show', $reportTemplate) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('report_template_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.report-templates.edit', $reportTemplate) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('report_template_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $reportTemplate->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                            <td>
                                {{ $reportTemplate->id }}
                            </td>
                            <td>
                                @if($reportTemplate->relatedClassName)
                                    <span class="badge badge-relationship">{{ $reportTemplate->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($reportTemplate->relatedTestName)
                                    <span class="badge badge-relationship">{{ $reportTemplate->relatedTestName->test_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($reportTemplate->relatedAbilityName)
                                    <span class="badge badge-relationship">{{ $reportTemplate->relatedAbilityName->ability_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $reportTemplate->test_sten_score_from }}
                            </td>
                            <td>
                                {{ $reportTemplate->test_sten_score_to }}
                            </td>
                            <td>
                                {{ $reportTemplate->short_review }}
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $reportTemplate->id }}">
                                    @php
                                        $truncatedContent = str_word_count($reportTemplate->report_1, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $reportTemplate->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $reportTemplate->id }}">
                                    @php
                                        $truncatedContent = str_word_count($reportTemplate->report_2, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $reportTemplate->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $reportTemplate->id }}">
                                    @php
                                        $truncatedContent = str_word_count($reportTemplate->report_3, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $reportTemplate->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $reportTemplate->id }}">
                                    @php
                                        $truncatedContent = str_word_count($reportTemplate->report_4, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $reportTemplate->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $reportTemplate->id }}">
                                    @php
                                        $truncatedContent = str_word_count($reportTemplate->report_5, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $reportTemplate->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $reportTemplate->id }}">
                                    @php
                                        $truncatedContent = str_word_count($reportTemplate->report_6, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $reportTemplate->id }}')">Read More</p>
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
            {{ $reportTemplates->links() }}
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