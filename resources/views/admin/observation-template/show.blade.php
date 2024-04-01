@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.observationTemplate.title_singular') }}:
                    {{ trans('cruds.observationTemplate.fields.id') }}
                    {{ $observationTemplate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.id') }}
                            </th>
                            <td>
                                {{ $observationTemplate->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.related_class_name') }}
                            </th>
                            <td>
                                @if($observationTemplate->relatedClassName)
                                    <span class="badge badge-relationship">{{ $observationTemplate->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.related_test') }}
                            </th>
                            <td>
                                @if($observationTemplate->relatedTest)
                                    <span class="badge badge-relationship">{{ $observationTemplate->relatedTest->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.related_ability') }}
                            </th>
                            <td>
                                @if($observationTemplate->relatedAbility)
                                    <span class="badge badge-relationship">{{ $observationTemplate->relatedAbility->ability_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.sten_score_from') }}
                            </th>
                            <td>
                                {{ $observationTemplate->sten_score_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.sten_score_to') }}
                            </th>
                            <td>
                                {{ $observationTemplate->sten_score_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.observation_1') }}
                            </th>
                            <td>
                                {{ $observationTemplate->observation_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.observation_2') }}
                            </th>
                            <td>
                                {{ $observationTemplate->observation_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.observation_3') }}
                            </th>
                            <td>
                                {{ $observationTemplate->observation_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.observation_4') }}
                            </th>
                            <td>
                                {{ $observationTemplate->observation_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.observation_5') }}
                            </th>
                            <td>
                                {{ $observationTemplate->observation_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.observation_6') }}
                            </th>
                            <td>
                                {{ $observationTemplate->observation_6 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.stream_group') }}
                            </th>
                            <td>
                                @foreach($observationTemplate->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.stream') }}
                            </th>
                            <td>
                                @foreach($observationTemplate->stream as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.course') }}
                            </th>
                            <td>
                                @foreach($observationTemplate->course as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.college') }}
                            </th>
                            <td>
                                @foreach($observationTemplate->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.profession') }}
                            </th>
                            <td>
                                @foreach($observationTemplate->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.observationTemplate.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $observationTemplate->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('observation_template_edit')
                    <a href="{{ route('admin.observation-templates.edit', $observationTemplate) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.observation-templates.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection