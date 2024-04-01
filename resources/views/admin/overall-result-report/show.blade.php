@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.overallResultReport.title_singular') }}:
                    {{ trans('cruds.overallResultReport.fields.id') }}
                    {{ $overallResultReport->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.id') }}
                            </th>
                            <td>
                                {{ $overallResultReport->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.student_test_taken') }}
                            </th>
                            <td>
                                @if($overallResultReport->studentTestTaken)
                                    <span class="badge badge-relationship">{{ $overallResultReport->studentTestTaken->stage ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.overall_raw_score') }}
                            </th>
                            <td>
                                {{ $overallResultReport->overall_raw_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.overall_sten_score') }}
                            </th>
                            <td>
                                {{ $overallResultReport->overall_sten_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.short_description') }}
                            </th>
                            <td>
                                {{ $overallResultReport->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.report_1') }}
                            </th>
                            <td>
                                {{ $overallResultReport->report_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.report_2') }}
                            </th>
                            <td>
                                {{ $overallResultReport->report_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.report_3') }}
                            </th>
                            <td>
                                {{ $overallResultReport->report_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.report_4') }}
                            </th>
                            <td>
                                {{ $overallResultReport->report_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.report_5') }}
                            </th>
                            <td>
                                {{ $overallResultReport->report_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallResultReport.fields.report_6') }}
                            </th>
                            <td>
                                {{ $overallResultReport->report_6 }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('overall_result_report_edit')
                    <a href="{{ route('admin.overall-result-reports.edit', $overallResultReport) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.overall-result-reports.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection