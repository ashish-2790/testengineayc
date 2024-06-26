@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.reportTemplate.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('report_template_create')
                    <a class="btn btn-indigo" href="{{ route('admin.report-templates.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.reportTemplate.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('report-template.index')

    </div>
</div>
@endsection