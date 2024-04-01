@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.overallReportTemplate.title_singular') }}:
                    {{ trans('cruds.overallReportTemplate.fields.id') }}
                    {{ $overallReportTemplate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.id') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.class') }}
                            </th>
                            <td>
                                @foreach($overallReportTemplate->class as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->class_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.test_type') }}
                            </th>
                            <td>
                                @if($overallReportTemplate->testType)
                                    <span class="badge badge-relationship">{{ $overallReportTemplate->testType->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.overall_stenscore_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->overall_stenscore_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.overall_stenscore_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->overall_stenscore_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.short_review') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->short_review }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.detailed_report_1') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->detailed_report_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.detailed_report_2') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->detailed_report_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.detailed_report_3') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->detailed_report_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.detailed_report_4') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->detailed_report_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.detailed_report_5') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->detailed_report_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.detailed_report_6') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->detailed_report_6 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_1_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_1_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_1_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_1_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_2_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_2_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_2_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_2_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_3_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_3_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_3_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_3_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_4_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_4_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_4_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_4_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_5_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_5_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_5_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_5_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_6_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_6_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_6_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_6_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_7_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_7_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_7_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_7_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_8_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_8_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_8_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_8_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_9_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_9_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_9_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_9_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_10_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_10_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_10_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_10_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_11_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_11_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_11_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_11_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_12_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_12_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_12_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_12_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_13_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_13_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_13_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_13_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_14_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_14_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_14_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_14_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_15_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_15_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_15_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_15_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_16_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_16_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_16_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_16_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_17_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_17_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_17_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_17_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_18_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_18_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_18_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_18_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_19_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_19_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_19_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_19_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_20_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_20_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_20_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_20_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_21_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_21_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_21_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_21_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_22_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_22_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_22_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_22_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_23_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_23_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_23_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_23_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_24_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_24_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_24_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_24_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_25_from') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_25_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallReportTemplate.fields.ability_25_to') }}
                            </th>
                            <td>
                                {{ $overallReportTemplate->ability_25_to }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('overall_report_template_edit')
                    <a href="{{ route('admin.overall-report-templates.edit', $overallReportTemplate) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.overall-report-templates.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection