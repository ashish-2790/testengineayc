<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('school_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="School" format="csv" />
                <livewire:excel-export model="School" format="xlsx" />
                <livewire:excel-export model="School" format="pdf" />
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
                            {{ trans('cruds.school.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.class_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.logo_square') }}
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.logo_wide') }}
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.website') }}
                            @include('components.table.sort', ['field' => 'website'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.phone_no') }}
                            @include('components.table.sort', ['field' => 'phone_no'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.school_code') }}
                            @include('components.table.sort', ['field' => 'school_code'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.affiliation') }}
                            @include('components.table.sort', ['field' => 'affiliation'])
                        </th>
                        <th>
                            {{ trans('cruds.school.fields.inactive') }}
                            @include('components.table.sort', ['field' => 'inactive'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schools as $school)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $school->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $school->id }}
                            </td>
                            <td>
                                @foreach($school->className as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->class_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $school->name }}
                            </td>
                            <td>
                                {{ $school->address }}
                            </td>
                            <td>
                                @foreach($school->logo_square as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($school->logo_wide as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $school->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $school->email }}
                                </a>
                            </td>
                            <td>
                                {{ $school->website }}
                            </td>
                            <td>
                                {{ $school->phone_no }}
                            </td>
                            <td>
                                {{ $school->school_code }}
                            </td>
                            <td>
                                {{ $school->affiliation }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $school->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('school_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.schools.show', $school) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('school_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.schools.edit', $school) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('school_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $school->id }})" wire:loading.attr="disabled">
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
            {{ $schools->links() }}
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