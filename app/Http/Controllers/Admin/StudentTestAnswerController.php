<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentTestAnswer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentTestAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_test_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-test-answer.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_test_answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-test-answer.create');
    }

    public function edit(StudentTestAnswer $studentTestAnswer)
    {
        abort_if(Gate::denies('student_test_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-test-answer.edit', compact('studentTestAnswer'));
    }

    public function show(StudentTestAnswer $studentTestAnswer)
    {
        abort_if(Gate::denies('student_test_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentTestAnswer->load('relatedStudent', 'relatedStudentTestTaken', 'relatedQuestionBank', 'createTest');

        return view('admin.student-test-answer.show', compact('studentTestAnswer'));
    }
}
