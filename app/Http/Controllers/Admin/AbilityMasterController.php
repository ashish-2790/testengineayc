<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbilityMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbilityMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ability_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-master.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ability_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-master.create');
    }

    public function edit(AbilityMaster $abilityMaster)
    {
        abort_if(Gate::denies('ability_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ability-master.edit', compact('abilityMaster'));
    }

    public function show(AbilityMaster $abilityMaster)
    {
        abort_if(Gate::denies('ability_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abilityMaster->load('relatedClassName', 'relatedTest');

        return view('admin.ability-master.show', compact('abilityMaster'));
    }
}
