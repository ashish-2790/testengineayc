@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.overallObservation.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('overall_observation_create')
                    <a class="btn btn-indigo" href="{{ route('admin.overall-observations.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.overallObservation.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('overall-observation.index')

    </div>
</div>
@endsection