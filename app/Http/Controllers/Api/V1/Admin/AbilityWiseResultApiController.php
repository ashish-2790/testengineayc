<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbilityWiseResultRequest;
use App\Http\Requests\UpdateAbilityWiseResultRequest;
use App\Http\Resources\Admin\AbilityWiseResultResource;
use App\Models\AbilityWiseResult;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AbilityWiseResultApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ability_wise_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AbilityWiseResultResource(AbilityWiseResult::with(['studentTestTaken', 'overallResult', 'ability'])->get());
    }

    public function store(StoreAbilityWiseResultRequest $request)
    {
        $abilityWiseResult = AbilityWiseResult::create($request->validated());

        return (new AbilityWiseResultResource($abilityWiseResult))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AbilityWiseResult $abilityWiseResult)
    {
        abort_if(Gate::denies('ability_wise_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AbilityWiseResultResource($abilityWiseResult->load(['studentTestTaken', 'overallResult', 'ability']));
    }

    public function update(UpdateAbilityWiseResultRequest $request, AbilityWiseResult $abilityWiseResult)
    {
        $abilityWiseResult->update($request->validated());

        return (new AbilityWiseResultResource($abilityWiseResult))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AbilityWiseResult $abilityWiseResult)
    {
        abort_if(Gate::denies('ability_wise_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abilityWiseResult->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
