<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OverallReportTemplate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallReportTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_report_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-report-template.index');
    }

    public function create()
    {
        abort_if(Gate::denies('overall_report_template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-report-template.create');
    }

    public function edit(OverallReportTemplate $overallReportTemplate)
    {
        abort_if(Gate::denies('overall_report_template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-report-template.edit', compact('overallReportTemplate'));
    }

    public function show(OverallReportTemplate $overallReportTemplate)
    {
        abort_if(Gate::denies('overall_report_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallReportTemplate->load('class', 'testType');

        return view('admin.overall-report-template.show', compact('overallReportTemplate'));
    }
}
