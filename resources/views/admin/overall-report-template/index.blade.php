@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.overallReportTemplate.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('overall_report_template_create')
                    <a class="btn btn-indigo" href="{{ route('admin.overall-report-templates.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.overallReportTemplate.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('overall-report-template.index')

    </div>
</div>
@endsection