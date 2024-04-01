@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.abilityWiseObservation.title_singular') }}:
                    {{ trans('cruds.abilityWiseObservation.fields.id') }}
                    {{ $abilityWiseObservation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.id') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.student_test_taken') }}
                            </th>
                            <td>
                                @if($abilityWiseObservation->studentTestTaken)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->studentTestTaken->stage ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.overall_observation') }}
                            </th>
                            <td>
                                @if($abilityWiseObservation->overallObservation)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->overallObservation->overall_sten_score ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.ability_result') }}
                            </th>
                            <td>
                                @if($abilityWiseObservation->abilityResult)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->abilityResult->ability_sten_score ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.ability') }}
                            </th>
                            <td>
                                @if($abilityWiseObservation->ability)
                                    <span class="badge badge-relationship">{{ $abilityWiseObservation->ability->ability_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.short_description') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.ability_sten_score') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->ability_sten_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.observation_1') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->observation_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.observation_2') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->observation_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.observation_3') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->observation_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.observation_4') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->observation_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.observation_5') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->observation_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.observation_6') }}
                            </th>
                            <td>
                                {{ $abilityWiseObservation->observation_6 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.stream_group') }}
                            </th>
                            <td>
                                @foreach($abilityWiseObservation->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.stream_master') }}
                            </th>
                            <td>
                                @foreach($abilityWiseObservation->streamMaster as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.college') }}
                            </th>
                            <td>
                                @foreach($abilityWiseObservation->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.course') }}
                            </th>
                            <td>
                                @foreach($abilityWiseObservation->course as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.abilityWiseObservation.fields.profession') }}
                            </th>
                            <td>
                                @foreach($abilityWiseObservation->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('ability_wise_observation_edit')
                    <a href="{{ route('admin.ability-wise-observations.edit', $abilityWiseObservation) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.ability-wise-observations.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection