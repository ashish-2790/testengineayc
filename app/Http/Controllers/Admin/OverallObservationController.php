<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OverallObservation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallObservationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_observation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-observation.index');
    }

    public function create()
    {
        abort_if(Gate::denies('overall_observation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-observation.create');
    }

    public function edit(OverallObservation $overallObservation)
    {
        abort_if(Gate::denies('overall_observation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-observation.edit', compact('overallObservation'));
    }

    public function show(OverallObservation $overallObservation)
    {
        abort_if(Gate::denies('overall_observation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallObservation->load('studentTestTaken', 'overallResult', 'streamGroup', 'stream', 'college', 'courses', 'profession');

        return view('admin.overall-observation.show', compact('overallObservation'));
    }
}
