<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('school_licence_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="SchoolLicence" format="csv" />
                <livewire:excel-export model="SchoolLicence" format="xlsx" />
                <livewire:excel-export model="SchoolLicence" format="pdf" />
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
                            {{ trans('cruds.schoolLicence.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.schoolLicence.fields.school_name') }}
                            @include('components.table.sort', ['field' => 'school_name.name'])
                        </th>
                        <th>
                            {{ trans('cruds.schoolLicence.fields.related_class_name') }}
                            @include('components.table.sort', ['field' => 'related_class_name.class_name'])
                        </th>
                        <th>
                            {{ trans('cruds.schoolLicence.fields.related_test_type') }}
                            @include('components.table.sort', ['field' => 'related_test_type.test_name'])
                        </th>
                        <th>
                            {{ trans('cruds.schoolLicence.fields.student_count') }}
                            @include('components.table.sort', ['field' => 'student_count'])
                        </th>
                        <th>
                            {{ trans('cruds.schoolLicence.fields.valid_from') }}
                            @include('components.table.sort', ['field' => 'valid_from'])
                        </th>
                        <th>
                            {{ trans('cruds.schoolLicence.fields.valid_to') }}
                            @include('components.table.sort', ['field' => 'valid_to'])
                        </th>
                        <th>
                            {{ trans('cruds.schoolLicence.fields.inactive') }}
                            @include('components.table.sort', ['field' => 'inactive'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schoolLicences as $schoolLicence)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $schoolLicence->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $schoolLicence->id }}
                            </td>
                            <td>
                                @if($schoolLicence->schoolName)
                                    <span class="badge badge-relationship">{{ $schoolLicence->schoolName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($schoolLicence->relatedClassName)
                                    <span class="badge badge-relationship">{{ $schoolLicence->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($schoolLicence->relatedTestType)
                                    <span class="badge badge-relationship">{{ $schoolLicence->relatedTestType->test_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $schoolLicence->student_count }}
                            </td>
                            <td>
                                {{ $schoolLicence->valid_from }}
                            </td>
                            <td>
                                {{ $schoolLicence->valid_to }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $schoolLicence->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('school_licence_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.school-licences.show', $schoolLicence) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('school_licence_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.school-licences.edit', $schoolLicence) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('school_licence_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $schoolLicence->id }})" wire:loading.attr="disabled">
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
            {{ $schoolLicences->links() }}
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