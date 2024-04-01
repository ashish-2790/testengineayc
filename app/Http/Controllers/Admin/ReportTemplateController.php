<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportTemplate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('report_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.report-template.index');
    }

    public function create()
    {
        abort_if(Gate::denies('report_template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.report-template.create');
    }

    public function edit(ReportTemplate $reportTemplate)
    {
        abort_if(Gate::denies('report_template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.report-template.edit', compact('reportTemplate'));
    }

    public function show(ReportTemplate $reportTemplate)
    {
        abort_if(Gate::denies('report_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportTemplate->load('relatedClassName', 'relatedTestName', 'relatedAbilityName');

        return view('admin.report-template.show', compact('reportTemplate'));
    }
}
