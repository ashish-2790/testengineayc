@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.createTest.title_singular') }}:
                    {{ trans('cruds.createTest.fields.id') }}
                    {{ $createTest->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.id') }}
                            </th>
                            <td>
                                {{ $createTest->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.instruction') }}
                            </th>
                            <td>
                                {{ $createTest->instruction }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.video_url') }}
                            </th>
                            <td>
                                {{ $createTest->video_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.related_question_paper') }}
                            </th>
                            <td>
                                @if($createTest->relatedQuestionPaper)
                                    <span class="badge badge-relationship">{{ $createTest->relatedQuestionPaper->question_paper_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.valid_from') }}
                            </th>
                            <td>
                                {{ $createTest->valid_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.valid_to') }}
                            </th>
                            <td>
                                {{ $createTest->valid_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.related_class') }}
                            </th>
                            <td>
                                @if($createTest->relatedClass)
                                    <span class="badge badge-relationship">{{ $createTest->relatedClass->class_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.related_test_type') }}
                            </th>
                            <td>
                                @if($createTest->relatedTestType)
                                    <span class="badge badge-relationship">{{ $createTest->relatedTestType->test_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.max_student_join') }}
                            </th>
                            <td>
                                {{ $createTest->max_student_join }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.maximum_score') }}
                            </th>
                            <td>
                                {{ $createTest->maximum_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.minimum_score') }}
                            </th>
                            <td>
                                {{ $createTest->minimum_score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.createTest.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $createTest->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('create_test_edit')
                    <a href="{{ route('admin.create-tests.edit', $createTest) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.create-tests.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection