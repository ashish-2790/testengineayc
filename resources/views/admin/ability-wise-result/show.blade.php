@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.abilityWiseResult.title_singular') }}:
                    {{ trans('cruds.abilityWiseResult.fields.id') }}
                    {{ $abilityWiseResult->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.id') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.student_test_taken') }}
                            </th>
                            <td>
                                @if($abilityWiseResult->studentTestTaken)
                                    <span class="badge badge-relationship">{{ $abilityWiseResult->studentTestTaken->stage ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.overall_result') }}
                            </th>
                            <td>
                                @if($abilityWiseResult->overallResult)
                                    <span class="badge badge-relationship">{{ $abilityWiseResult->overallResult->overall_sten_score ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.ability') }}
                            </th>
                            <td>
                                @if($abilityWiseResult->ability)
                                    <span class="badge badge-relationship">{{ $abilityWiseResult->ability->ability_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.ability_raw_score') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->ability_raw_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.ability_sten_score') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->ability_sten_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.short_description') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.report_1') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->report_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.report_2') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->report_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.report_3') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->report_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.report_4') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->report_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.report_5') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->report_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseResult.fields.report_6') }}
                            </th>
                            <td>
                                {{ $abilityWiseResult->report_6 }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('ability_wise_result_edit')
                    <a href="{{ route('admin.ability-wise-results.edit', $abilityWiseResult) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.ability-wise-results.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection