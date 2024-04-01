@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.reportTemplate.title_singular') }}:
                    {{ trans('cruds.reportTemplate.fields.id') }}
                    {{ $reportTemplate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.id') }}
                            </th>
                            <td>
                                {{ $reportTemplate->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.related_class_name') }}
                            </th>
                            <td>
                                @if($reportTemplate->relatedClassName)
                                    <span class="badge badge-relationship">{{ $reportTemplate->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.related_test_name') }}
                            </th>
                            <td>
                                @if($reportTemplate->relatedTestName)
                                    <span class="badge badge-relationship">{{ $reportTemplate->relatedTestName->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.related_ability_name') }}
                            </th>
                            <td>
                                @if($reportTemplate->relatedAbilityName)
                                    <span class="badge badge-relationship">{{ $reportTemplate->relatedAbilityName->ability_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.test_sten_score_from') }}
                            </th>
                            <td>
                                {{ $reportTemplate->test_sten_score_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.test_sten_score_to') }}
                            </th>
                            <td>
                                {{ $reportTemplate->test_sten_score_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.short_review') }}
                            </th>
                            <td>
                                {{ $reportTemplate->short_review }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.report_1') }}
                            </th>
                            <td>
                                {{ $reportTemplate->report_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.report_2') }}
                            </th>
                            <td>
                                {{ $reportTemplate->report_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.report_3') }}
                            </th>
                            <td>
                                {{ $reportTemplate->report_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.report_4') }}
                            </th>
                            <td>
                                {{ $reportTemplate->report_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.report_5') }}
                            </th>
                            <td>
                                {{ $reportTemplate->report_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportTemplate.fields.report_6') }}
                            </th>
                            <td>
                                {{ $reportTemplate->report_6 }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('report_template_edit')
                    <a href="{{ route('admin.report-templates.edit', $reportTemplate) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.report-templates.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection