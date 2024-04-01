<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentMainReportRequest;
use App\Http\Requests\UpdateStudentMainReportRequest;
use App\Http\Resources\Admin\StudentMainReportResource;
use App\Models\StudentMainReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentMainReportApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_main_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentMainReportResource(StudentMainReport::with(['relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest', 'relatedReportTemplate'])->get());
    }

    public function store(StoreStudentMainReportRequest $request)
    {
        $studentMainReport = StudentMainReport::create($request->validated());

        return (new StudentMainReportResource($studentMainReport))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StudentMainReport $studentMainReport)
    {
        abort_if(Gate::denies('student_main_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentMainReportResource($studentMainReport->load(['relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest', 'relatedReportTemplate']));
    }

    public function update(UpdateStudentMainReportRequest $request, StudentMainReport $studentMainReport)
    {
        $studentMainReport->update($request->validated());

        return (new StudentMainReportResource($studentMainReport))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StudentMainReport $studentMainReport)
    {
        abort_if(Gate::denies('student_main_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentMainReport->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
