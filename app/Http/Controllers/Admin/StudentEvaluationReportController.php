<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEvaluationReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentEvaluationReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_evaluation_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-evaluation-report.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_evaluation_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-evaluation-report.create');
    }

    public function edit(StudentEvaluationReport $studentEvaluationReport)
    {
        abort_if(Gate::denies('student_evaluation_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-evaluation-report.edit', compact('studentEvaluationReport'));
    }

    public function show(StudentEvaluationReport $studentEvaluationReport)
    {
        abort_if(Gate::denies('student_evaluation_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentEvaluationReport->load('relatedStudent', 'relatedClassName', 'relatedTest', 'relatedAbility', 'createTest', 'relatedObservationTemplate', 'relatedCollege', 'relatedStream', 'relatedProfession');

        return view('admin.student-evaluation-report.show', compact('studentEvaluationReport'));
    }
}
