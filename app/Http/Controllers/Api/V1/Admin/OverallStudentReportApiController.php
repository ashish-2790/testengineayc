<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOverallStudentReportRequest;
use App\Http\Requests\UpdateOverallStudentReportRequest;
use App\Http\Resources\Admin\OverallStudentReportResource;
use App\Models\OverallStudentReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallStudentReportApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_student_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallStudentReportResource(OverallStudentReport::with(['class', 'student'])->get());
    }

    public function store(StoreOverallStudentReportRequest $request)
    {
        $overallStudentReport = OverallStudentReport::create($request->validated());

        return (new OverallStudentReportResource($overallStudentReport))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OverallStudentReport $overallStudentReport)
    {
        abort_if(Gate::denies('overall_student_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OverallStudentReportResource($overallStudentReport->load(['class', 'student']));
    }

    public function update(UpdateOverallStudentReportRequest $request, OverallStudentReport $overallStudentReport)
    {
        $overallStudentReport->update($request->validated());

        return (new OverallStudentReportResource($overallStudentReport))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OverallStudentReport $overallStudentReport)
    {
        abort_if(Gate::denies('overall_student_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallStudentReport->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
