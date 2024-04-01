<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('sten_chart_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="StenChart" format="csv" />
                <livewire:excel-export model="StenChart" format="xlsx" />
                <livewire:excel-export model="StenChart" format="pdf" />
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
                            {{ trans('cruds.stenChart.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.stenChart.fields.related_class') }}
                            @include('components.table.sort', ['field' => 'related_class.class_name'])
                        </th>
                        <th>
                            {{ trans('cruds.stenChart.fields.related_test_name') }}
                            @include('components.table.sort', ['field' => 'related_test_name.test_name'])
                        </th>
                        <th>
                            {{ trans('cruds.stenChart.fields.related_ability_name') }}
                            @include('components.table.sort', ['field' => 'related_ability_name.ability_name'])
                        </th>
{{--                        <th>--}}
{{--                            {{ trans('cruds.stenChart.fields.max_score_raw') }}--}}
{{--                            @include('components.table.sort', ['field' => 'max_score_raw'])--}}
{{--                        </th>--}}
                        <th>
                            {{ trans('cruds.stenChart.fields.score_raw_from') }}
                            @include('components.table.sort', ['field' => 'score_raw_from'])
                        </th>
                        <th>
                            {{ trans('cruds.stenChart.fields.score_raw_to') }}
                            @include('components.table.sort', ['field' => 'score_raw_to'])
                        </th>
                        <th>
                            {{ trans('cruds.stenChart.fields.sten_score') }}
                            @include('components.table.sort', ['field' => 'sten_score'])
                        </th>
                        <th>
                            {{ trans('cruds.stenChart.fields.inactive') }}
                            @include('components.table.sort', ['field' => 'inactive'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stenCharts as $stenChart)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $stenChart->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $stenChart->id }}
                            </td>
                            <td>
                                @if($stenChart->relatedClass)
                                    <span class="badge badge-relationship">{{ $stenChart->relatedClass->class_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($stenChart->relatedTestName)
                                    <span class="badge badge-relationship">{{ $stenChart->relatedTestName->test_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($stenChart->relatedAbilityName)
                                    <span class="badge badge-relationship">{{ $stenChart->relatedAbilityName->ability_name ?? '' }}</span>
                                @endif
                            </td>
{{--                            <td>--}}
{{--                                {{ $stenChart->max_score_raw }}--}}
{{--                            </td>--}}
                            <td>
                                {{ $stenChart->score_raw_from }}
                            </td>
                            <td>
                                {{ $stenChart->score_raw_to }}
                            </td>
                            <td>
                                {{ $stenChart->sten_score }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $stenChart->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('sten_chart_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.sten-charts.show', $stenChart) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('sten_chart_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.sten-charts.edit', $stenChart) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('sten_chart_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $stenChart->id }})" wire:loading.attr="disabled">
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
            {{ $stenCharts->links() }}
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