<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbilityWiseResult;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbilityWiseResultController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ability_wise_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-wise-result.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ability_wise_result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-wise-result.create');
    }

    public function edit(AbilityWiseResult $abilityWiseResult)
    {
        abort_if(Gate::denies('ability_wise_result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-wise-result.edit', compact('abilityWiseResult'));
    }

    public function show(AbilityWiseResult $abilityWiseResult)
    {
        abort_if(Gate::denies('ability_wise_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abilityWiseResult->load('studentTestTaken', 'overallResult', 'ability');

        return view('admin.ability-wise-result.show', compact('abilityWiseResult'));
    }
}
