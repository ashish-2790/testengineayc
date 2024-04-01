<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success text-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger text-rose-600">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

{{--            @can('user_delete')--}}
{{--                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>--}}
{{--                    {{ __('Delete Selected') }}--}}
{{--                </button>--}}
{{--            @endcan--}}

{{--            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))--}}
{{--                <livewire:excel-export model="User" format="csv" />--}}
{{--                <livewire:excel-export model="User" format="xlsx" />--}}
{{--                <livewire:excel-export model="User" format="pdf" />--}}
{{--            @endif--}}




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>
@if(Auth::user()->is_admin == 1)
    <div class="form-group w-full lg:w-6/12 px-4 {{ $errors->has('user.related_school_name_id') ? 'invalid' : '' }}">
        <label class="form-label"
               for="related_school_name">{{ trans('cruds.user.fields.related_school_name') }}</label>
        <x-select-list class="form-control" id="related_school_name" name="related_school_name"
                       :options="$this->listsForFields['related_school_name']"
                       wire:model="related_school_name"/>
        <div class="validation-message">
            {{ $errors->first('user.related_school_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.related_school_name_helper') }}
        </div>
    </div>
@endif
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                <tr>
                    <th class="w-9">
                    </th>
                    <th class="w-28">
                        {{ trans('cruds.user.fields.id') }}
                        @include('components.table.sort', ['field' => 'id'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.related_school_name') }}
                        @include('components.table.sort', ['field' => 'related_school_name.name'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
                        @include('components.table.sort', ['field' => 'name'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                        @include('components.table.sort', ['field' => 'email'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email_verified_at') }}
                        @include('components.table.sort', ['field' => 'email_verified_at'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.related_class_name') }}
                        @include('components.table.sort', ['field' => 'related_class_name.class_name'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.related_test_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.roles') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.locale') }}
                        @include('components.table.sort', ['field' => 'locale'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.phone_no') }}
                        @include('components.table.sort', ['field' => 'phone_no'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.age') }}
                        @include('components.table.sort', ['field' => 'age'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.gender') }}
                        @include('components.table.sort', ['field' => 'gender'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.occupation') }}
                        @include('components.table.sort', ['field' => 'occupation'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.address') }}
                        @include('components.table.sort', ['field' => 'address'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.date_of_birth') }}
                        @include('components.table.sort', ['field' => 'date_of_birth'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.disability_status') }}
                        @include('components.table.sort', ['field' => 'disability_status'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.qualification_status') }}
                        @include('components.table.sort', ['field' => 'qualification_status'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.stream_group') }}
                        @include('components.table.sort', ['field' => 'stream_group.stream_group_master'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.stream') }}
                        @include('components.table.sort', ['field' => 'stream.stream_name'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.percent_10') }}
                        @include('components.table.sort', ['field' => 'percent_10'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.percent_11') }}
                        @include('components.table.sort', ['field' => 'percent_11'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.percent_12') }}
                        @include('components.table.sort', ['field' => 'percent_12'])
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.percent_graduation') }}
                        @include('components.table.sort', ['field' => 'percent_graduation'])
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)

                    <tr>
                        <td>
                            <div class="flex justify-end">
                                @can('user_show')
                                    <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.users.show', $user) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.users.edit', $user) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
                                        {{ trans('global.delete') }}
                                    </button>
                                @endcan
                            </div>
                        </td>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            @if($user->relatedSchoolName)
                                <span class="badge badge-relationship">{{ $user->relatedSchoolName->name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $user->email }}
                            </a>
                        </td>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                        <td>
                            @if($user->relatedClassName)
                                <span class="badge badge-relationship">{{ $user->relatedClassName->class_name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @foreach($user->relatedTestType as $key => $entry)
                                <span class="badge badge-relationship">{{ $entry->test_name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($user->roles as $key => $entry)
                                <span class="badge badge-relationship">{{ $entry->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $user->locale }}
                        </td>
                        <td>
                            {{ $user->phone_no }}
                        </td>
                        <td>
                            {{ $user->age }}
                        </td>
                        <td>
                            {{ $user->gender_label }}
                        </td>
                        <td>
                            {{ $user->occupation }}
                        </td>
                        <td>
                            {{ $user->address }}
                        </td>
                        <td>
                            {{ $user->date_of_birth }}
                        </td>
                        <td>
                            {{ $user->disability_status_label }}
                        </td>
                        <td>
                            {{ $user->qualification_status_label }}
                        </td>
                        <td>
                            @if($user->streamGroup)
                                <span class="badge badge-relationship">{{ $user->streamGroup->stream_group_master ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @if($user->stream)
                                <span class="badge badge-relationship">{{ $user->stream->stream_name ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $user->percent_10 }}
                        </td>
                        <td>
                            {{ $user->percent_11 }}
                        </td>
                        <td>
                            {{ $user->percent_12 }}
                        </td>
                        <td>
                            {{ $user->percent_graduation }}
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
            {{ $users->links() }}
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