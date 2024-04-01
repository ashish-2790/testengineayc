<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbilityWiseObservation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbilityWiseObservationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ability_wise_observation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-wise-observation.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ability_wise_observation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-wise-observation.create');
    }

    public function edit(AbilityWiseObservation $abilityWiseObservation)
    {
        abort_if(Gate::denies('ability_wise_observation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-wise-observation.edit', compact('abilityWiseObservation'));
    }

    public function show(AbilityWiseObservation $abilityWiseObservation)
    {
        abort_if(Gate::denies('ability_wise_observation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abilityWiseObservation->load('studentTestTaken', 'overallObservation', 'abilityResult', 'ability', 'streamGroup', 'streamMaster', 'college', 'course', 'profession');

        return view('admin.ability-wise-observation.show', compact('abilityWiseObservation'));
    }
}
