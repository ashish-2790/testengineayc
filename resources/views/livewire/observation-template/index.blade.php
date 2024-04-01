<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('observation_template_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ObservationTemplate" format="csv" />
                <livewire:excel-export model="ObservationTemplate" format="xlsx" />
                <livewire:excel-export model="ObservationTemplate" format="pdf" />
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
                            {{ trans('cruds.observationTemplate.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.related_class_name') }}
                            @include('components.table.sort', ['field' => 'related_class_name.class_name'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.related_test') }}
                            @include('components.table.sort', ['field' => 'related_test.test_name'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.related_ability') }}
                            @include('components.table.sort', ['field' => 'related_ability.ability_name'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.sten_score_from') }}
                            @include('components.table.sort', ['field' => 'sten_score_from'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.sten_score_to') }}
                            @include('components.table.sort', ['field' => 'sten_score_to'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.observation_1') }}
                            @include('components.table.sort', ['field' => 'observation_1'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.observation_2') }}
                            @include('components.table.sort', ['field' => 'observation_2'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.observation_3') }}
                            @include('components.table.sort', ['field' => 'observation_3'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.observation_4') }}
                            @include('components.table.sort', ['field' => 'observation_4'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.observation_5') }}
                            @include('components.table.sort', ['field' => 'observation_5'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.observation_6') }}
                            @include('components.table.sort', ['field' => 'observation_6'])
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.stream_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.stream') }}
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.college') }}
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.profession') }}
                        </th>
                        <th>
                            {{ trans('cruds.observationTemplate.fields.inactive') }}
                            @include('components.table.sort', ['field' => 'inactive'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($observationTemplates as $observationTemplate)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $observationTemplate->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $observationTemplate->id }}
                            </td>
                            <td>
                                @if($observationTemplate->relatedClassName)
                                    <span class="badge badge-relationship">{{ $observationTemplate->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($observationTemplate->relatedTest)
                                    <span class="badge badge-relationship">{{ $observationTemplate->relatedTest->test_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($observationTemplate->relatedAbility)
                                    <span class="badge badge-relationship">{{ $observationTemplate->relatedAbility->ability_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $observationTemplate->sten_score_from }}
                            </td>
                            <td>
                                {{ $observationTemplate->sten_score_to }}
                            </td>
                            <td>
                                {{ $observationTemplate->observation_1 }}
                            </td>
                            <td>
                                {{ $observationTemplate->observation_2 }}
                            </td>
                            <td>
                                {{ $observationTemplate->observation_3 }}
                            </td>
                            <td>
                                {{ $observationTemplate->observation_4 }}
                            </td>
                            <td>
                                {{ $observationTemplate->observation_5 }}
                            </td>
                            <td>
                                {{ $observationTemplate->observation_6 }}
                            </td>
                            <td>
                                @foreach($observationTemplate->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($observationTemplate->stream as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($observationTemplate->course as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($observationTemplate->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($observationTemplate->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $observationTemplate->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('observation_template_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.observation-templates.show', $observationTemplate) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('observation_template_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.observation-templates.edit', $observationTemplate) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('observation_template_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $observationTemplate->id }})" wire:loading.attr="disabled">
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
            {{ $observationTemplates->links() }}
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