@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.stenChart.title_singular') }}:
                    {{ trans('cruds.stenChart.fields.id') }}
                    {{ $stenChart->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.id') }}
                            </th>
                            <td>
                                {{ $stenChart->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.related_class') }}
                            </th>
                            <td>
                                @if($stenChart->relatedClass)
                                    <span class="badge badge-relationship">{{ $stenChart->relatedClass->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.related_test_name') }}
                            </th>
                            <td>
                                @if($stenChart->relatedTestName)
                                    <span class="badge badge-relationship">{{ $stenChart->relatedTestName->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.related_ability_name') }}
                            </th>
                            <td>
                                @if($stenChart->relatedAbilityName)
                                    <span class="badge badge-relationship">{{ $stenChart->relatedAbilityName->ability_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.max_score_raw') }}
                            </th>
                            <td>
                                {{ $stenChart->max_score_raw }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.score_raw_from') }}
                            </th>
                            <td>
                                {{ $stenChart->score_raw_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.score_raw_to') }}
                            </th>
                            <td>
                                {{ $stenChart->score_raw_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.sten_score') }}
                            </th>
                            <td>
                                {{ $stenChart->sten_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stenChart.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $stenChart->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('sten_chart_edit')
                    <a href="{{ route('admin.sten-charts.edit', $stenChart) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.sten-charts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection