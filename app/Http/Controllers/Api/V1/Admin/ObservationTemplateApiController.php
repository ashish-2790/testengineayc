<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreObservationTemplateRequest;
use App\Http\Requests\UpdateObservationTemplateRequest;
use App\Http\Resources\Admin\ObservationTemplateResource;
use App\Models\ObservationTemplate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObservationTemplateApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('observation_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ObservationTemplateResource(ObservationTemplate::with(['relatedClassName', 'relatedTest', 'relatedAbility', 'streamGroup', 'stream', 'course', 'college', 'profession'])->get());
    }

    public function store(StoreObservationTemplateRequest $request)
    {
        $observationTemplate = ObservationTemplate::create($request->validated());
        $observationTemplate->streamGroup()->sync($request->input('streamGroup', []));
        $observationTemplate->stream()->sync($request->input('stream', []));
        $observationTemplate->course()->sync($request->input('course', []));
        $observationTemplate->college()->sync($request->input('college', []));
        $observationTemplate->profession()->sync($request->input('profession', []));

        return (new ObservationTemplateResource($observationTemplate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ObservationTemplate $observationTemplate)
    {
        abort_if(Gate::denies('observation_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ObservationTemplateResource($observationTemplate->load(['relatedClassName', 'relatedTest', 'relatedAbility', 'streamGroup', 'stream', 'course', 'college', 'profession']));
    }

    public function update(UpdateObservationTemplateRequest $request, ObservationTemplate $observationTemplate)
    {
        $observationTemplate->update($request->validated());
        $observationTemplate->streamGroup()->sync($request->input('streamGroup', []));
        $observationTemplate->stream()->sync($request->input('stream', []));
        $observationTemplate->course()->sync($request->input('course', []));
        $observationTemplate->college()->sync($request->input('college', []));
        $observationTemplate->profession()->sync($request->input('profession', []));

        return (new ObservationTemplateResource($observationTemplate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ObservationTemplate $observationTemplate)
    {
        abort_if(Gate::denies('observation_template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $observationTemplate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
