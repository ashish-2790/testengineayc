<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('overall_result_report_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="OverallResultReport" format="csv" />
                <livewire:excel-export model="OverallResultReport" format="xlsx" />
                <livewire:excel-export model="OverallResultReport" format="pdf" />
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
                            {{ trans('cruds.overallResultReport.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.student_test_taken') }}
                            @include('components.table.sort', ['field' => 'student_test_taken.stage'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.overall_raw_score') }}
                            @include('components.table.sort', ['field' => 'overall_raw_score'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.overall_sten_score') }}
                            @include('components.table.sort', ['field' => 'overall_sten_score'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.short_description') }}
                            @include('components.table.sort', ['field' => 'short_description'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.report_1') }}
                            @include('components.table.sort', ['field' => 'report_1'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.report_2') }}
                            @include('components.table.sort', ['field' => 'report_2'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.report_3') }}
                            @include('components.table.sort', ['field' => 'report_3'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.report_4') }}
                            @include('components.table.sort', ['field' => 'report_4'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.report_5') }}
                            @include('components.table.sort', ['field' => 'report_5'])
                        </th>
                        <th>
                            {{ trans('cruds.overallResultReport.fields.report_6') }}
                            @include('components.table.sort', ['field' => 'report_6'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($overallResultReports as $overallResultReport)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $overallResultReport->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $overallResultReport->id }}
                            </td>
                            <td>
                                @if($overallResultReport->studentTestTaken)
                                    <span class="badge badge-relationship">{{ $overallResultReport->studentTestTaken->stage ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $overallResultReport->overall_raw_score }}
                            </td>
                            <td>
                                {{ $overallResultReport->overall_sten_score }}
                            </td>
                            <td>
                                {{ $overallResultReport->short_description }}
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $overallResultReport->id }}">
                                    @php
                                        $truncatedContent = str_word_count($overallResultReport->report_1, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $overallResultReport->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $overallResultReport->id }}">
                                    @php
                                        $truncatedContent = str_word_count($overallResultReport->report_2, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $overallResultReport->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $overallResultReport->id }}">
                                    @php
                                        $truncatedContent = str_word_count($overallResultReport->report_3, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $overallResultReport->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $overallResultReport->id }}">
                                    @php
                                        $truncatedContent = str_word_count($overallResultReport->report_4, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $overallResultReport->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $overallResultReport->id }}">
                                    @php
                                        $truncatedContent = str_word_count($overallResultReport->report_5, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $overallResultReport->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $overallResultReport->id }}">
                                    @php
                                        $truncatedContent = str_word_count($overallResultReport->report_6, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $overallResultReport->id }}')">Read More</p>
                            </td>

                            <td>
                                <div class="flex justify-end">
                                    @can('overall_result_report_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.overall-result-reports.show', $overallResultReport) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('overall_result_report_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.overall-result-reports.edit', $overallResultReport) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('overall_result_report_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $overallResultReport->id }})" wire:loading.attr="disabled">
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
            {{ $overallResultReports->links() }}
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