<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OverallStudentReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallStudentReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_student_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-student-report.index');
    }

    public function create()
    {
        abort_if(Gate::denies('overall_student_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-student-report.create');
    }

    public function edit(OverallStudentReport $overallStudentReport)
    {
        abort_if(Gate::denies('overall_student_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-student-report.edit', compact('overallStudentReport'));
    }

    public function show(OverallStudentReport $overallStudentReport)
    {
        abort_if(Gate::denies('overall_student_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallStudentReport->load('class', 'student');

        return view('admin.overall-student-report.show', compact('overallStudentReport'));
    }
}
