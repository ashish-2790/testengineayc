<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('course_master_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="CourseMaster" format="csv" />
                <livewire:excel-export model="CourseMaster" format="xlsx" />
                <livewire:excel-export model="CourseMaster" format="pdf" />
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
                            {{ trans('cruds.courseMaster.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.courseMaster.fields.stream') }}
                            @include('components.table.sort', ['field' => 'stream.stream_name'])
                        </th>
                        <th>
                            {{ trans('cruds.courseMaster.fields.course_name') }}
                            @include('components.table.sort', ['field' => 'course_name'])
                        </th>
                        <th>
                            {{ trans('cruds.courseMaster.fields.course_description') }}
                            @include('components.table.sort', ['field' => 'course_description'])
                        </th>
                        <th>
                            {{ trans('cruds.courseMaster.fields.related_college') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseMaster.fields.image_url') }}
                            @include('components.table.sort', ['field' => 'image_url'])
                        </th>
                        <th>
                            {{ trans('cruds.courseMaster.fields.related_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseMaster.fields.inactive') }}
                            @include('components.table.sort', ['field' => 'inactive'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courseMasters as $courseMaster)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $courseMaster->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $courseMaster->id }}
                            </td>
                            <td>
                                @if($courseMaster->stream)
                                    <span class="badge badge-relationship">{{ $courseMaster->stream->stream_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $courseMaster->course_name }}
                            </td>
                            <td>
                                {{ $courseMaster->course_description }}
                            </td>
                            <td>
                                @foreach($courseMaster->relatedCollege as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $courseMaster->image_url }}
                            </td>
                            <td>
                                @foreach($courseMaster->related_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $courseMaster->inactive ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('course_master_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.course-masters.show', $courseMaster) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('course_master_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.course-masters.edit', $courseMaster) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('course_master_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $courseMaster->id }})" wire:loading.attr="disabled">
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
            {{ $courseMasters->links() }}
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