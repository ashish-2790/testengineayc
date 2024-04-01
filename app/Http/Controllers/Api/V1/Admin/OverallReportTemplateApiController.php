<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOverallReportTemplateRequest;
use App\Http\Requests\UpdateOverallReportTemplateRequest;
use App\Http\Resources\Admin\OverallReportTemplateResource;
use App\Models\OverallReportTemplate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallReportTemplateApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_report_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallReportTemplateResource(OverallReportTemplate::with(['class', 'testType'])->get());
    }

    public function store(StoreOverallReportTemplateRequest $request)
    {
        $overallReportTemplate = OverallReportTemplate::create($request->validated());
        $overallReportTemplate->class()->sync($request->input('class', []));

        return (new OverallReportTemplateResource($overallReportTemplate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OverallReportTemplate $overallReportTemplate)
    {
        abort_if(Gate::denies('overall_report_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallReportTemplateResource($overallReportTemplate->load(['class', 'testType']));
    }

    public function update(UpdateOverallReportTemplateRequest $request, OverallReportTemplate $overallReportTemplate)
    {
        $overallReportTemplate->update($request->validated());
        $overallReportTemplate->class()->sync($request->input('class', []));

        return (new OverallReportTemplateResource($overallReportTemplate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OverallReportTemplate $overallReportTemplate)
    {
        abort_if(Gate::denies('overall_report_template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallReportTemplate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
