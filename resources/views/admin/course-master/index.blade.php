@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.courseMaster.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('course_master_create')
                    <a class="btn btn-indigo" href="{{ route('admin.course-masters.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.courseMaster.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('course-master.index')

    </div>
</div>
@endsection