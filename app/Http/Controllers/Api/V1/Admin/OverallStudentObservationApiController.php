<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOverallStudentObservationRequest;
use App\Http\Requests\UpdateOverallStudentObservationRequest;
use App\Http\Resources\Admin\OverallStudentObservationResource;
use App\Models\OverallStudentObservation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallStudentObservationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_student_observation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallStudentObservationResource(OverallStudentObservation::with(['class', 'student'])->get());
    }

    public function store(StoreOverallStudentObservationRequest $request)
    {
        $overallStudentObservation = OverallStudentObservation::create($request->validated());

        return (new OverallStudentObservationResource($overallStudentObservation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OverallStudentObservation $overallStudentObservation)
    {
        abort_if(Gate::denies('overall_student_observation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallStudentObservationResource($overallStudentObservation->load(['class', 'student']));
    }

    public function update(UpdateOverallStudentObservationRequest $request, OverallStudentObservation $overallStudentObservation)
    {
        $overallStudentObservation->update($request->validated());

        return (new OverallStudentObservationResource($overallStudentObservation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OverallStudentObservation $overallStudentObservation)
    {
        abort_if(Gate::denies('overall_student_observation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallStudentObservation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
