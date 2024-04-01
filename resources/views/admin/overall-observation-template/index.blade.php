@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.overallObservationTemplate.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('overall_observation_template_create')
                    <a class="btn btn-indigo" href="{{ route('admin.overall-observation-templates.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.overallObservationTemplate.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('overall-observation-template.index')

    </div>
</div>
@endsection