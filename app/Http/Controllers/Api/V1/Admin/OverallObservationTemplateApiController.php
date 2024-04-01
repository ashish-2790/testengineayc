<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOverallObservationTemplateRequest;
use App\Http\Requests\UpdateOverallObservationTemplateRequest;
use App\Http\Resources\Admin\OverallObservationTemplateResource;
use App\Models\OverallObservationTemplate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallObservationTemplateApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_observation_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallObservationTemplateResource(OverallObservationTemplate::with(['class', 'testType', 'streamGroup', 'stream', 'course', 'college', 'profession'])->get());
    }

    public function store(StoreOverallObservationTemplateRequest $request)
    {
        $overallObservationTemplate = OverallObservationTemplate::create($request->validated());
        $overallObservationTemplate->class()->sync($request->input('class', []));
        $overallObservationTemplate->streamGroup()->sync($request->input('streamGroup', []));
        $overallObservationTemplate->stream()->sync($request->input('stream', []));
        $overallObservationTemplate->course()->sync($request->input('course', []));
        $overallObservationTemplate->college()->sync($request->input('college', []));
        $overallObservationTemplate->profession()->sync($request->input('profession', []));

        return (new OverallObservationTemplateResource($overallObservationTemplate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OverallObservationTemplate $overallObservationTemplate)
    {
        abort_if(Gate::denies('overall_observation_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallObservationTemplateResource($overallObservationTemplate->load(['class', 'testType', 'streamGroup', 'stream', 'course', 'college', 'profession']));
    }

    public function update(UpdateOverallObservationTemplateRequest $request, OverallObservationTemplate $overallObservationTemplate)
    {
        $overallObservationTemplate->update($request->validated());
        $overallObservationTemplate->class()->sync($request->input('class', []));
        $overallObservationTemplate->streamGroup()->sync($request->input('streamGroup', []));
        $overallObservationTemplate->stream()->sync($request->input('stream', []));
        $overallObservationTemplate->course()->sync($request->input('course', []));
        $overallObservationTemplate->college()->sync($request->input('college', []));
        $overallObservationTemplate->profession()->sync($request->input('profession', []));

        return (new OverallObservationTemplateResource($overallObservationTemplate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OverallObservationTemplate $overallObservationTemplate)
    {
        abort_if(Gate::denies('overall_observation_template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallObservationTemplate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
