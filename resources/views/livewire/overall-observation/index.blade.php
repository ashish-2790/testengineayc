<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('overall_observation_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="OverallObservation" format="csv" />
                <livewire:excel-export model="OverallObservation" format="xlsx" />
                <livewire:excel-export model="OverallObservation" format="pdf" />
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
                            {{ trans('cruds.overallObservation.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.student_test_taken') }}
                            @include('components.table.sort', ['field' => 'student_test_taken.stage'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.overall_result') }}
                            @include('components.table.sort', ['field' => 'overall_result.overall_raw_score'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.overall_sten_score') }}
                            @include('components.table.sort', ['field' => 'overall_sten_score'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.short_description') }}
                            @include('components.table.sort', ['field' => 'short_description'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.observation_1') }}
                            @include('components.table.sort', ['field' => 'observation_1'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.observation_2') }}
                            @include('components.table.sort', ['field' => 'observation_2'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.observation_3') }}
                            @include('components.table.sort', ['field' => 'observation_3'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.observation_4') }}
                            @include('components.table.sort', ['field' => 'observation_4'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.observation_5') }}
                            @include('components.table.sort', ['field' => 'observation_5'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.observation_6') }}
                            @include('components.table.sort', ['field' => 'observation_6'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.stream_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.stream') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.college') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.courses') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservation.fields.profession') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($overallObservations as $overallObservation)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $overallObservation->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $overallObservation->id }}
                            </td>
                            <td>
                                @if($overallObservation->studentTestTaken)
                                    <span class="badge badge-relationship">{{ $overallObservation->studentTestTaken->stage ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($overallObservation->overallResult)
                                    <span class="badge badge-relationship">{{ $overallObservation->overallResult->overall_raw_score ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $overallObservation->overall_sten_score }}
                            </td>
                            <td>
                                {{ $overallObservation->short_description }}
                            </td>
                            <td>
                                {{ $overallObservation->observation_1 }}
                            </td>
                            <td>
                                {{ $overallObservation->observation_2 }}
                            </td>
                            <td>
                                {{ $overallObservation->observation_3 }}
                            </td>
                            <td>
                                {{ $overallObservation->observation_4 }}
                            </td>
                            <td>
                                {{ $overallObservation->observation_5 }}
                            </td>
                            <td>
                                {{ $overallObservation->observation_6 }}
                            </td>
                            <td>
                                @foreach($overallObservation->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservation->stream as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservation->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservation->courses as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservation->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('overall_observation_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.overall-observations.show', $overallObservation) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('overall_observation_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.overall-observations.edit', $overallObservation) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('overall_observation_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $overallObservation->id }})" wire:loading.attr="disabled">
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
            {{ $overallObservations->links() }}
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