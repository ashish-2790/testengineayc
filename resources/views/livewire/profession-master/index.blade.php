<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('profession_master_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ProfessionMaster" format="csv" />
                <livewire:excel-export model="ProfessionMaster" format="xlsx" />
                <livewire:excel-export model="ProfessionMaster" format="pdf" />
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
                            {{ trans('cruds.professionMaster.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.professionMaster.fields.profession_name') }}
                            @include('components.table.sort', ['field' => 'profession_name'])
                        </th>
                        <th>
                            {{ trans('cruds.professionMaster.fields.inactive') }}
                            @include('components.table.sort', ['field' => 'inactive'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($professionMasters as $professionMaster)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $professionMaster->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $professionMaster->id }}
                            </td>
                            <td>
                                {{ $professionMaster->profession_name }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $professionMaster->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('profession_master_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.profession-masters.show', $professionMaster) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('profession_master_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.profession-masters.edit', $professionMaster) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('profession_master_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $professionMaster->id }})" wire:loading.attr="disabled">
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
            {{ $professionMasters->links() }}
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