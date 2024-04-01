<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOverallResultReportRequest;
use App\Http\Requests\UpdateOverallResultReportRequest;
use App\Http\Resources\Admin\OverallResultReportResource;
use App\Models\OverallResultReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallResultReportApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_result_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallResultReportResource(OverallResultReport::with(['studentTestTaken'])->get());
    }

    public function store(StoreOverallResultReportRequest $request)
    {
        $overallResultReport = OverallResultReport::create($request->validated());

        return (new OverallResultReportResource($overallResultReport))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OverallResultReport $overallResultReport)
    {
        abort_if(Gate::denies('overall_result_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallResultReportResource($overallResultReport->load(['studentTestTaken']));
    }

    public function update(UpdateOverallResultReportRequest $request, OverallResultReport $overallResultReport)
    {
        $overallResultReport->update($request->validated());

        return (new OverallResultReportResource($overallResultReport))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OverallResultReport $overallResultReport)
    {
        abort_if(Gate::denies('overall_result_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallResultReport->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
