<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('overall_observation_template_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="OverallObservationTemplate" format="csv" />
                <livewire:excel-export model="OverallObservationTemplate" format="xlsx" />
                <livewire:excel-export model="OverallObservationTemplate" format="pdf" />
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
                            {{ trans('cruds.overallObservationTemplate.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.class') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.test_type') }}
                            @include('components.table.sort', ['field' => 'test_type.test_name'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_from') }}
                            @include('components.table.sort', ['field' => 'overall_stenscore_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_to') }}
                            @include('components.table.sort', ['field' => 'overall_stenscore_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.short_description') }}
                            @include('components.table.sort', ['field' => 'short_description'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_1') }}
                            @include('components.table.sort', ['field' => 'detailed_observation_1'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_2') }}
                            @include('components.table.sort', ['field' => 'detailed_observation_2'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_3') }}
                            @include('components.table.sort', ['field' => 'detailed_observation_3'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_4') }}
                            @include('components.table.sort', ['field' => 'detailed_observation_4'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_5') }}
                            @include('components.table.sort', ['field' => 'detailed_observation_5'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_6') }}
                            @include('components.table.sort', ['field' => 'detailed_observation_6'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.stream_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.stream') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.college') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.profession') }}
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_1_from') }}
                            @include('components.table.sort', ['field' => 'ability_1_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_1_to') }}
                            @include('components.table.sort', ['field' => 'ability_1_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_2_from') }}
                            @include('components.table.sort', ['field' => 'ability_2_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_2_to') }}
                            @include('components.table.sort', ['field' => 'ability_2_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_3_from') }}
                            @include('components.table.sort', ['field' => 'ability_3_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_3_to') }}
                            @include('components.table.sort', ['field' => 'ability_3_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_4_from') }}
                            @include('components.table.sort', ['field' => 'ability_4_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_4_to') }}
                            @include('components.table.sort', ['field' => 'ability_4_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_5_from') }}
                            @include('components.table.sort', ['field' => 'ability_5_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_5_to') }}
                            @include('components.table.sort', ['field' => 'ability_5_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_6_from') }}
                            @include('components.table.sort', ['field' => 'ability_6_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_6_to') }}
                            @include('components.table.sort', ['field' => 'ability_6_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_7_from') }}
                            @include('components.table.sort', ['field' => 'ability_7_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_7_to') }}
                            @include('components.table.sort', ['field' => 'ability_7_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_8_from') }}
                            @include('components.table.sort', ['field' => 'ability_8_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_8_to') }}
                            @include('components.table.sort', ['field' => 'ability_8_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_9_from') }}
                            @include('components.table.sort', ['field' => 'ability_9_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_9_to') }}
                            @include('components.table.sort', ['field' => 'ability_9_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_10_from') }}
                            @include('components.table.sort', ['field' => 'ability_10_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_10_to') }}
                            @include('components.table.sort', ['field' => 'ability_10_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_11_from') }}
                            @include('components.table.sort', ['field' => 'ability_11_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_11_to') }}
                            @include('components.table.sort', ['field' => 'ability_11_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_12_from') }}
                            @include('components.table.sort', ['field' => 'ability_12_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_12_to') }}
                            @include('components.table.sort', ['field' => 'ability_12_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_13_from') }}
                            @include('components.table.sort', ['field' => 'ability_13_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_13_to') }}
                            @include('components.table.sort', ['field' => 'ability_13_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_14_from') }}
                            @include('components.table.sort', ['field' => 'ability_14_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_14_to') }}
                            @include('components.table.sort', ['field' => 'ability_14_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_15_from') }}
                            @include('components.table.sort', ['field' => 'ability_15_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_15_to') }}
                            @include('components.table.sort', ['field' => 'ability_15_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_16_from') }}
                            @include('components.table.sort', ['field' => 'ability_16_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_16_to') }}
                            @include('components.table.sort', ['field' => 'ability_16_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_17_from') }}
                            @include('components.table.sort', ['field' => 'ability_17_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_17_to') }}
                            @include('components.table.sort', ['field' => 'ability_17_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_18_from') }}
                            @include('components.table.sort', ['field' => 'ability_18_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_18_to') }}
                            @include('components.table.sort', ['field' => 'ability_18_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_19_from') }}
                            @include('components.table.sort', ['field' => 'ability_19_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_19_to') }}
                            @include('components.table.sort', ['field' => 'ability_19_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_20_from') }}
                            @include('components.table.sort', ['field' => 'ability_20_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_20_to') }}
                            @include('components.table.sort', ['field' => 'ability_20_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_21_from') }}
                            @include('components.table.sort', ['field' => 'ability_21_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_21_to') }}
                            @include('components.table.sort', ['field' => 'ability_21_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_22_from') }}
                            @include('components.table.sort', ['field' => 'ability_22_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_22_to') }}
                            @include('components.table.sort', ['field' => 'ability_22_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_23_from') }}
                            @include('components.table.sort', ['field' => 'ability_23_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_23_to') }}
                            @include('components.table.sort', ['field' => 'ability_23_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_24_from') }}
                            @include('components.table.sort', ['field' => 'ability_24_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_24_to') }}
                            @include('components.table.sort', ['field' => 'ability_24_to'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_25_from') }}
                            @include('components.table.sort', ['field' => 'ability_25_from'])
                        </th>
                        <th>
                            {{ trans('cruds.overallObservationTemplate.fields.ability_25_to') }}
                            @include('components.table.sort', ['field' => 'ability_25_to'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($overallObservationTemplates as $overallObservationTemplate)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $overallObservationTemplate->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $overallObservationTemplate->id }}
                            </td>
                            <td>
                                @foreach($overallObservationTemplate->class as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->class_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($overallObservationTemplate->testType)
                                    <span class="badge badge-relationship">{{ $overallObservationTemplate->testType->test_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $overallObservationTemplate->overall_stenscore_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->overall_stenscore_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->short_description }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_1 }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_2 }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_3 }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_4 }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_5 }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_6 }}
                            </td>
                            <td>
                                @foreach($overallObservationTemplate->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservationTemplate->stream as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservationTemplate->course as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservationTemplate->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($overallObservationTemplate->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_1_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_1_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_2_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_2_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_3_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_3_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_4_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_4_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_5_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_5_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_6_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_6_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_7_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_7_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_8_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_8_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_9_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_9_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_10_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_10_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_11_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_11_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_12_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_12_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_13_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_13_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_14_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_14_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_15_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_15_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_16_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_16_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_17_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_17_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_18_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_18_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_19_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_19_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_20_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_20_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_21_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_21_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_22_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_22_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_23_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_23_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_24_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_24_to }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_25_from }}
                            </td>
                            <td>
                                {{ $overallObservationTemplate->ability_25_to }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('overall_observation_template_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.overall-observation-templates.show', $overallObservationTemplate) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('overall_observation_template_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.overall-observation-templates.edit', $overallObservationTemplate) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('overall_observation_template_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $overallObservationTemplate->id }})" wire:loading.attr="disabled">
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
            {{ $overallObservationTemplates->links() }}
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