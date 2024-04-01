<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('ability_master_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="AbilityMaster" format="csv" />
                <livewire:excel-export model="AbilityMaster" format="xlsx" />
                <livewire:excel-export model="AbilityMaster" format="pdf" />
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
                            {{ trans('cruds.abilityMaster.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityMaster.fields.related_class_name') }}
                            @include('components.table.sort', ['field' => 'related_class_name.class_name'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityMaster.fields.related_test') }}
                            @include('components.table.sort', ['field' => 'related_test.test_name'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityMaster.fields.ability_name') }}
                            @include('components.table.sort', ['field' => 'ability_name'])
                        </th>
                        <th>
                            {{ trans('cruds.abilityMaster.fields.ability_instruction') }}
                            @include('components.table.sort', ['field' => 'ability_instruction'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($abilityMasters as $abilityMaster)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $abilityMaster->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $abilityMaster->id }}
                            </td>
                            <td>
                                @if($abilityMaster->relatedClassName)
                                    <span class="badge badge-relationship">{{ $abilityMaster->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($abilityMaster->relatedTest)
                                    <span class="badge badge-relationship">{{ $abilityMaster->relatedTest->test_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $abilityMaster->ability_name }}
                            </td>
                            <td>
                                <div class="read-more-content" id="readMoreContent{{ $abilityMaster->id }}">
                                    @php
                                        $truncatedContent = str_word_count($abilityMaster->ability_instruction, 1, '1234567890');
                                        $truncatedContent = implode(' ', array_slice($truncatedContent, 0, 10));
                                    @endphp
                                    {!! $truncatedContent !!}
                                </div>
                                <p class="read-more-toggle" onclick="toggleReadMore('readMoreContent{{ $abilityMaster->id }}')">Read More</p>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('ability_master_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.ability-masters.show', $abilityMaster) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('ability_master_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.ability-masters.edit', $abilityMaster) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('ability_master_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $abilityMaster->id }})" wire:loading.attr="disabled">
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
            {{ $abilityMasters->links() }}
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