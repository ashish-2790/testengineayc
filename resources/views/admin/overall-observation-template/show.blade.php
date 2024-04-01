@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.overallObservationTemplate.title_singular') }}:
                    {{ trans('cruds.overallObservationTemplate.fields.id') }}
                    {{ $overallObservationTemplate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.id') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.class') }}
                            </th>
                            <td>
                                @foreach($overallObservationTemplate->class as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->class_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.test_type') }}
                            </th>
                            <td>
                                @if($overallObservationTemplate->testType)
                                    <span class="badge badge-relationship">{{ $overallObservationTemplate->testType->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->overall_stenscore_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.overall_stenscore_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->overall_stenscore_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.short_description') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_1') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_2') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_3') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_4') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_4 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_5') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_5 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.detailed_observation_6') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->detailed_observation_6 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.stream_group') }}
                            </th>
                            <td>
                                @foreach($overallObservationTemplate->streamGroup as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_group_master }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.stream') }}
                            </th>
                            <td>
                                @foreach($overallObservationTemplate->stream as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->stream_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.course') }}
                            </th>
                            <td>
                                @foreach($overallObservationTemplate->course as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->course_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.college') }}
                            </th>
                            <td>
                                @foreach($overallObservationTemplate->college as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->college_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.profession') }}
                            </th>
                            <td>
                                @foreach($overallObservationTemplate->profession as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->profession_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_1_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_1_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_1_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_1_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_2_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_2_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_2_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_2_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_3_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_3_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_3_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_3_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_4_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_4_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_4_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_4_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_5_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_5_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_5_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_5_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_6_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_6_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_6_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_6_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_7_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_7_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_7_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_7_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_8_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_8_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_8_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_8_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_9_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_9_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_9_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_9_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_10_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_10_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_10_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_10_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_11_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_11_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_11_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_11_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_12_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_12_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_12_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_12_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_13_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_13_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_13_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_13_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_14_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_14_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_14_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_14_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_15_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_15_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_15_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_15_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_16_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_16_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_16_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_16_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_17_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_17_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_17_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_17_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_18_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_18_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_18_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_18_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_19_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_19_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_19_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_19_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_20_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_20_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_20_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_20_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_21_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_21_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_21_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_21_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_22_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_22_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_22_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_22_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_23_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_23_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_23_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_23_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_24_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_24_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_24_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_24_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_25_from') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_25_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.overallObservationTemplate.fields.ability_25_to') }}
                            </th>
                            <td>
                                {{ $overallObservationTemplate->ability_25_to }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('overall_observation_template_edit')
                    <a href="{{ route('admin.overall-observation-templates.edit', $overallObservationTemplate) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.overall-observation-templates.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection