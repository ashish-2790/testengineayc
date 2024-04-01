<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentResult;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentResultController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-result.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-result.create');
    }

    public function edit(StudentResult $studentResult)
    {
        abort_if(Gate::denies('student_result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-result.edit', compact('studentResult'));
    }

    public function show(StudentResult $studentResult)
    {
        abort_if(Gate::denies('student_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentResult->load('relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest');

        return view('admin.student-result.show', compact('studentResult'));
    }
}
