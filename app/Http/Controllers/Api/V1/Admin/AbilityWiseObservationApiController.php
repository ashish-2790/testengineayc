<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbilityWiseObservationRequest;
use App\Http\Requests\UpdateAbilityWiseObservationRequest;
use App\Http\Resources\Admin\AbilityWiseObservationResource;
use App\Models\AbilityWiseObservation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbilityWiseObservationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ability_wise_observation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AbilityWiseObservationResource(AbilityWiseObservation::with(['studentTestTaken', 'overallObservation', 'abilityResult', 'ability', 'streamGroup', 'streamMaster', 'college', 'course', 'profession'])->get());
    }

    public function store(StoreAbilityWiseObservationRequest $request)
    {
        $abilityWiseObservation = AbilityWiseObservation::create($request->validated());
        $abilityWiseObservation->streamGroup()->sync($request->input('streamGroup', []));
        $abilityWiseObservation->streamMaster()->sync($request->input('streamMaster', []));
        $abilityWiseObservation->college()->sync($request->input('college', []));
        $abilityWiseObservation->course()->sync($request->input('course', []));
        $abilityWiseObservation->profession()->sync($request->input('profession', []));

        return (new AbilityWiseObservationResource($abilityWiseObservation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AbilityWiseObservation $abilityWiseObservation)
    {
        abort_if(Gate::denies('ability_wise_observation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AbilityWiseObservationResource($abilityWiseObservation->load(['studentTestTaken', 'overallObservation', 'abilityResult', 'ability', 'streamGroup', 'streamMaster', 'college', 'course', 'profession']));
    }

    public function update(UpdateAbilityWiseObservationRequest $request, AbilityWiseObservation $abilityWiseObservation)
    {
        $abilityWiseObservation->update($request->validated());
        $abilityWiseObservation->streamGroup()->sync($request->input('streamGroup', []));
        $abilityWiseObservation->streamMaster()->sync($request->input('streamMaster', []));
        $abilityWiseObservation->college()->sync($request->input('college', []));
        $abilityWiseObservation->course()->sync($request->input('course', []));
        $abilityWiseObservation->profession()->sync($request->input('profession', []));

        return (new AbilityWiseObservationResource($abilityWiseObservation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AbilityWiseObservation $abilityWiseObservation)
    {
        abort_if(Gate::denies('ability_wise_observation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abilityWiseObservation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
