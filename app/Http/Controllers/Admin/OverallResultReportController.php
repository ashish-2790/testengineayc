<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OverallResultReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallResultReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_result_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-result-report.index');
    }

    public function create()
    {
        abort_if(Gate::denies('overall_result_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-result-report.create');
    }

    public function edit(OverallResultReport $overallResultReport)
    {
        abort_if(Gate::denies('overall_result_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-result-report.edit', compact('overallResultReport'));
    }

    public function show(OverallResultReport $overallResultReport)
    {
        abort_if(Gate::denies('overall_result_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallResultReport->load('studentTestTaken');

        return view('admin.overall-result-report.show', compact('overallResultReport'));
    }
}
