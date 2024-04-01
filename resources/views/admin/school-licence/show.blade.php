@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.schoolLicence.title_singular') }}:
                    {{ trans('cruds.schoolLicence.fields.id') }}
                    {{ $schoolLicence->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.id') }}
                            </th>
                            <td>
                                {{ $schoolLicence->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.school_name') }}
                            </th>
                            <td>
                                @if($schoolLicence->schoolName)
                                    <span class="badge badge-relationship">{{ $schoolLicence->schoolName->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.related_class_name') }}
                            </th>
                            <td>
                                @if($schoolLicence->relatedClassName)
                                    <span class="badge badge-relationship">{{ $schoolLicence->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.related_test_type') }}
                            </th>
                            <td>
                                @if($schoolLicence->relatedTestType)
                                    <span class="badge badge-relationship">{{ $schoolLicence->relatedTestType->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.student_count') }}
                            </th>
                            <td>
                                {{ $schoolLicence->student_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.valid_from') }}
                            </th>
                            <td>
                                {{ $schoolLicence->valid_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.valid_to') }}
                            </th>
                            <td>
                                {{ $schoolLicence->valid_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.schoolLicence.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $schoolLicence->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('school_licence_edit')
                    <a href="{{ route('admin.school-licences.edit', $schoolLicence) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.school-licences.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection