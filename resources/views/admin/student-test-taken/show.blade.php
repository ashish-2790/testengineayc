@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.studentTestTaken.title_singular') }}:
                    {{ trans('cruds.studentTestTaken.fields.id') }}
                    {{ $studentTestTaken->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.id') }}
                            </th>
                            <td>
                                {{ $studentTestTaken->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.related_class_name') }}
                            </th>
                            <td>
                                @if($studentTestTaken->relatedClassName)
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedClassName->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.related_student') }}
                            </th>
                            <td>
                                @if($studentTestTaken->relatedStudent)
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedStudent->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.related_create_test') }}
                            </th>
                            <td>
                                @if($studentTestTaken->relatedCreateTest)
                                    <span class="badge badge-relationship">{{ $studentTestTaken->relatedCreateTest->instruction ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.started_at') }}
                            </th>
                            <td>
                                {{ $studentTestTaken->started_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.ended_at') }}
                            </th>
                            <td>
                                {{ $studentTestTaken->ended_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.stage') }}
                            </th>
                            <td>
                                {{ $studentTestTaken->stage_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestTaken.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $studentTestTaken->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('student_test_taken_edit')
                    <a href="{{ route('admin.student-test-takens.edit', $studentTestTaken) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.student-test-takens.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection