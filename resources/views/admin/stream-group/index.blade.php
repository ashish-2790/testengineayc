@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.streamGroup.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('stream_group_create')
                    <a class="btn btn-indigo" href="{{ route('admin.stream-groups.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.streamGroup.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('stream-group.index')

    </div>
</div>
@endsection