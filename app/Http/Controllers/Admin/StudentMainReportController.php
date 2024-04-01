<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentMainReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentMainReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_main_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-main-report.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_main_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-main-report.create');
    }

    public function edit(StudentMainReport $studentMainReport)
    {
        abort_if(Gate::denies('student_main_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-main-report.edit', compact('studentMainReport'));
    }

    public function show(StudentMainReport $studentMainReport)
    {
        abort_if(Gate::denies('student_main_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentMainReport->load('relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest', 'relatedReportTemplate');

        return view('admin.student-main-report.show', compact('studentMainReport'));
    }
}
