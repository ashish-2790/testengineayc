<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentTestTaken;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentTestTakenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_test_taken_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-test-taken.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_test_taken_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-test-taken.create');
    }

    public function edit(StudentTestTaken $studentTestTaken)
    {
        abort_if(Gate::denies('student_test_taken_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-test-taken.edit', compact('studentTestTaken'));
    }

    public function show(StudentTestTaken $studentTestTaken)
    {
        abort_if(Gate::denies('student_test_taken_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentTestTaken->load('relatedClassName', 'relatedStudent', 'relatedCreateTest');

        return view('admin.student-test-taken.show', compact('studentTestTaken'));
    }
}
