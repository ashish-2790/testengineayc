@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.school.title_singular') }}:
                    {{ trans('cruds.school.fields.id') }}
                    {{ $school->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.id') }}
                            </th>
                            <td>
                                {{ $school->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.class_name') }}
                            </th>
                            <td>
                                @foreach($school->className as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->class_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.name') }}
                            </th>
                            <td>
                                {{ $school->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.address') }}
                            </th>
                            <td>
                                {{ $school->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.logo_square') }}
                            </th>
                            <td>
                                @foreach($school->logo_square as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.logo_wide') }}
                            </th>
                            <td>
                                @foreach($school->logo_wide as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $school->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $school->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.website') }}
                            </th>
                            <td>
                                {{ $school->website }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.phone_no') }}
                            </th>
                            <td>
                                {{ $school->phone_no }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.school_code') }}
                            </th>
                            <td>
                                {{ $school->school_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.affiliation') }}
                            </th>
                            <td>
                                {{ $school->affiliation }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $school->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('school_edit')
                    <a href="{{ route('admin.schools.edit', $school) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.schools.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection