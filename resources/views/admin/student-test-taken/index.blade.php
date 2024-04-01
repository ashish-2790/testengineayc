@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.studentTestTaken.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('student_test_taken_create')
                    <a class="btn btn-indigo" href="{{ route('admin.student-test-takens.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.studentTestTaken.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('student-test-taken.index')

    </div>
</div>
@endsection