@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.overallObservation.title_singular') }}:
                    {{ trans('cruds.overallObservation.fields.id') }}
                    {{ $overallObservation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.id') }}
                            </th>
                            <td>
                                {{ $overallObservation->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.student_test_taken') }}
                            </th>
                            <td>
                                @if($overallObservation->studentTestTaken)
                                    <span class="badge badge-relationship">{{ $overallObservation->studentTestTaken->stage ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.overall_result') }}
                            </th>
                            <td>
                                @if($overallObservation->overallResult)
                                    <span class="badge badge-relationship">{{ $overallObservation->overallResult->overall_raw_score ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.overall_sten_score') }}
                            </th>
                            <td>
                                {{ $overallObservation->overall_sten_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.short_description') }}
                            </th>
                            <td>
                                {{ $overallObservation->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.observation_1') }}
                            </th>
                            <td>
                                {{ $overallObservation->observation_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.observation_2') }}
                            </th>
                            <td>
                                {{ $overallObservation->observation_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.observation_3') }}
                            </th>
                            <td>
                                {{ $overallObservation->observation_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.observation_4') }}
                            </th>
                            <td>
                                {{ $overallObservation->observation_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.observation_5') }}
                            </th>
                            <td>
                                {{ $overallObservation->observation_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.observation_6') }}
                            </th>
                            <td>
                                {{ $overallObservation->observation_6 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.stream_group') }}
                            </th>
                            <td>
                                @foreach($overallObservation->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.stream') }}
                            </th>
                            <td>
                                @foreach($overallObservation->stream as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.college') }}
                            </th>
                            <td>
                                @foreach($overallObservation->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.courses') }}
                            </th>
                            <td>
                                @foreach($overallObservation->courses as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservation.fields.profession') }}
                            </th>
                            <td>
                                @foreach($overallObservation->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('overall_observation_edit')
                    <a href="{{ route('admin.overall-observations.edit', $overallObservation) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.overall-observations.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection