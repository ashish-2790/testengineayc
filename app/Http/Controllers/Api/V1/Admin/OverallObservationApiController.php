<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOverallObservationRequest;
use App\Http\Requests\UpdateOverallObservationRequest;
use App\Http\Resources\Admin\OverallObservationResource;
use App\Models\OverallObservation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallObservationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_observation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallObservationResource(OverallObservation::with(['studentTestTaken', 'overallResult', 'streamGroup', 'stream', 'college', 'courses', 'profession'])->get());
    }

    public function store(StoreOverallObservationRequest $request)
    {
        $overallObservation = OverallObservation::create($request->validated());
        $overallObservation->streamGroup()->sync($request->input('streamGroup', []));
        $overallObservation->stream()->sync($request->input('stream', []));
        $overallObservation->college()->sync($request->input('college', []));
        $overallObservation->courses()->sync($request->input('courses', []));
        $overallObservation->profession()->sync($request->input('profession', []));

        return (new OverallObservationResource($overallObservation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OverallObservation $overallObservation)
    {
        abort_if(Gate::denies('overall_observation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallObservationResource($overallObservation->load(['studentTestTaken', 'overallResult', 'streamGroup', 'stream', 'college', 'courses', 'profession']));
    }

    public function update(UpdateOverallObservationRequest $request, OverallObservation $overallObservation)
    {
        $overallObservation->update($request->validated());
        $overallObservation->streamGroup()->sync($request->input('streamGroup', []));
        $overallObservation->stream()->sync($request->input('stream', []));
        $overallObservation->college()->sync($request->input('college', []));
        $overallObservation->courses()->sync($request->input('courses', []));
        $overallObservation->profession()->sync($request->input('profession', []));

        return (new OverallObservationResource($overallObservation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OverallObservation $overallObservation)
    {
        abort_if(Gate::denies('overall_observation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallObservation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
