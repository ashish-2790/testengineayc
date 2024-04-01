@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.overallResultReport.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('overall_result_report_create')
                    <a class="btn btn-indigo" href="{{ route('admin.overall-result-reports.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.overallResultReport.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('overall-result-report.index')

    </div>
</div>
@endsection