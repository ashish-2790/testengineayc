<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OverallObservationTemplate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallObservationTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_observation_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-observation-template.index');
    }

    public function create()
    {
        abort_if(Gate::denies('overall_observation_template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-observation-template.create');
    }

    public function edit(OverallObservationTemplate $overallObservationTemplate)
    {
        abort_if(Gate::denies('overall_observation_template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-observation-template.edit', compact('overallObservationTemplate'));
    }

    public function show(OverallObservationTemplate $overallObservationTemplate)
    {
        abort_if(Gate::denies('overall_observation_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallObservationTemplate->load('class', 'testType', 'streamGroup', 'stream', 'course', 'college', 'profession');

        return view('admin.overall-observation-template.show', compact('overallObservationTemplate'));
    }
}
