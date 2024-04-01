@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.studentTestAnswer.title_singular') }}:
                    {{ trans('cruds.studentTestAnswer.fields.id') }}
                    {{ $studentTestAnswer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.id') }}
                            </th>
                            <td>
                                {{ $studentTestAnswer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.related_student') }}
                            </th>
                            <td>
                                @if($studentTestAnswer->relatedStudent)
                                    <span class="badge badge-relationship">{{ $studentTestAnswer->relatedStudent->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.related_student_test_taken') }}
                            </th>
                            <td>
                                @if($studentTestAnswer->relatedStudentTestTaken)
                                    <span class="badge badge-relationship">{{ $studentTestAnswer->relatedStudentTestTaken->started_at ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.related_question_bank') }}
                            </th>
                            <td>
                                @if($studentTestAnswer->relatedQuestionBank)
                                    <span class="badge badge-relationship">{{ $studentTestAnswer->relatedQuestionBank->question_text ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.create_test') }}
                            </th>
                            <td>
                                @if($studentTestAnswer->createTest)
                                    <span class="badge badge-relationship">{{ $studentTestAnswer->createTest->max_student_join ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.answer_choice') }}
                            </th>
                            <td>
                                {{ $studentTestAnswer->answer_choice }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.score') }}
                            </th>
                            <td>
                                {{ $studentTestAnswer->score }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.answer_status') }}
                            </th>
                            <td>
                                {{ $studentTestAnswer->answer_status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentTestAnswer.fields.inactive') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $studentTestAnswer->inactive ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('student_test_answer_edit')
                    <a href="{{ route('admin.student-test-answers.edit', $studentTestAnswer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.student-test-answers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection