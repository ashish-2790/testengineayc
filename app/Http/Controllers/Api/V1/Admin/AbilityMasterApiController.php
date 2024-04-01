<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbilityMasterRequest;
use App\Http\Requests\UpdateAbilityMasterRequest;
use App\Http\Resources\Admin\AbilityMasterResource;
use App\Models\AbilityMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbilityMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ability_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AbilityMasterResource(AbilityMaster::with(['relatedClassName', 'relatedTest'])->get());
    }

    public function store(StoreAbilityMasterRequest $request)
    {
        $abilityMaster = AbilityMaster::create($request->validated());

        return (new AbilityMasterResource($abilityMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AbilityMaster $abilityMaster)
    {
        abort_if(Gate::denies('ability_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AbilityMasterResource($abilityMaster->load(['relatedClassName', 'relatedTest']));
    }

    public function update(UpdateAbilityMasterRequest $request, AbilityMaster $abilityMaster)
    {
        $abilityMaster->update($request->validated());

        return (new AbilityMasterResource($abilityMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AbilityMaster $abilityMaster)
    {
        abort_if(Gate::denies('ability_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abilityMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
