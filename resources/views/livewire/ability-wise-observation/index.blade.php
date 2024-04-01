<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('ability_wise_observation_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="AbilityWiseObservation" format="csv" />
                <livewire:excel-export model="AbilityWiseObservation" format="xlsx" />
                <livewire:excel-export model="AbilityWiseObservation" format="pdf" />
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
                            {{ trans('cruds.abilityWiseObservation.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.student_test_taken') }}
                            @include('components.table.sort', ['field' => 'student_test_taken.stage'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.overall_observation') }}
                            @include('components.table.sort', ['field' => 'overall_observation.overall_sten_score'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.ability_result') }}
                            @include('components.table.sort', ['field' => 'ability_result.ability_sten_score'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.ability') }}
                            @include('components.table.sort', ['field' => 'ability.ability_name'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.short_description') }}
                            @include('components.table.sort', ['field' => 'short_description'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.ability_sten_score') }}
                            @include('components.table.sort', ['field' => 'ability_sten_score'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.observation_1') }}
                            @include('components.table.sort', ['field' => 'observation_1'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.observation_2') }}
                            @include('components.table.sort', ['field' => 'observation_2'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.observation_3') }}
                            @include('components.table.sort', ['field' => 'observation_3'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.observation_4') }}
                            @include('components.table.sort', ['field' => 'observation_4'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.observation_5') }}
                            @include('components.table.sort', ['field' => 'observation_5'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.observation_6') }}
                            @include('components.table.sort', ['field' => 'observation_6'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.stream_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.stream_master') }}
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.college') }}
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.abilityWiseObservation.fields.profession') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($abilityWiseObservations as $abilityWiseObservation)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $abilityWiseObservation->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $abilityWiseObservation->id }}
                            </td>
                            <td>
                                @if($abilityWiseObservation->studentTestTaken)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->studentTestTaken->stage ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($abilityWiseObservation->overallObservation)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->overallObservation->overall_sten_score ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($abilityWiseObservation->abilityResult)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->abilityResult->ability_sten_score ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($abilityWiseObservation->ability)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->ability->ability_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $abilityWiseObservation->short_description }}
                            </td>
                            <td>
                                {{ $abilityWiseObservation->ability_sten_score }}
                            </td>
                            <td>
                                {{ $abilityWiseObservation->observation_1 }}
                            </td>
                            <td>
                                {{ $abilityWiseObservation->observation_2 }}
                            </td>
                            <td>
                                {{ $abilityWiseObservation->observation_3 }}
                            </td>
                            <td>
                                {{ $abilityWiseObservation->observation_4 }}
                            </td>
                            <td>
                                {{ $abilityWiseObservation->observation_5 }}
                            </td>
                            <td>
                                {{ $abilityWiseObservation->observation_6 }}
                            </td>
                            <td>
                                @foreach($abilityWiseObservation->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($abilityWiseObservation->streamMaster as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($abilityWiseObservation->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($abilityWiseObservation->course as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($abilityWiseObservation->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('ability_wise_observation_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.ability-wise-observations.show', $abilityWiseObservation) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('ability_wise_observation_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.ability-wise-observations.edit', $abilityWiseObservation) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('ability_wise_observation_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $abilityWiseObservation->id }})" wire:loading.attr="disabled">
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
            {{ $abilityWiseObservations->links() }}
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