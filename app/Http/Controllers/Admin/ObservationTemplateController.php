<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ObservationTemplate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObservationTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('observation_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.observation-template.index');
    }

    public function create()
    {
        abort_if(Gate::denies('observation_template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.observation-template.create');
    }

    public function edit(ObservationTemplate $observationTemplate)
    {
        abort_if(Gate::denies('observation_template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.observation-template.edit', compact('observationTemplate'));
    }

    public function show(ObservationTemplate $observationTemplate)
    {
        abort_if(Gate::denies('observation_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $observationTemplate->load('relatedClassName', 'relatedTest', 'relatedAbility', 'streamGroup', 'stream', 'course', 'college', 'profession');

        return view('admin.observation-template.show', compact('observationTemplate'));
    }
}
