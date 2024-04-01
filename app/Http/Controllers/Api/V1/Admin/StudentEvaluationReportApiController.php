<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentEvaluationReportRequest;
use App\Http\Requests\UpdateStudentEvaluationReportRequest;
use App\Http\Resources\Admin\StudentEvaluationReportResource;
use App\Models\StudentEvaluationReport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentEvaluationReportApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_evaluation_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentEvaluationReportResource(StudentEvaluationReport::with(['relatedStudent', 'relatedClassName', 'relatedTest', 'relatedAbility', 'createTest', 'relatedObservationTemplate', 'relatedCollege', 'relatedStream', 'relatedProfession'])->get());
    }

    public function store(StoreStudentEvaluationReportRequest $request)
    {
        $studentEvaluationReport = StudentEvaluationReport::create($request->validated());
        $studentEvaluationReport->relatedCollege()->sync($request->input('relatedCollege', []));
        $studentEvaluationReport->relatedStream()->sync($request->input('relatedStream', []));
        $studentEvaluationReport->relatedProfession()->sync($request->input('relatedProfession', []));

        return (new StudentEvaluationReportResource($studentEvaluationReport))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StudentEvaluationReport $studentEvaluationReport)
    {
        abort_if(Gate::denies('student_evaluation_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentEvaluationReportResource($studentEvaluationReport->load(['relatedStudent', 'relatedClassName', 'relatedTest', 'relatedAbility', 'createTest', 'relatedObservationTemplate', 'relatedCollege', 'relatedStream', 'relatedProfession']));
    }

    public function update(UpdateStudentEvaluationReportRequest $request, StudentEvaluationReport $studentEvaluationReport)
    {
        $studentEvaluationReport->update($request->validated());
        $studentEvaluationReport->relatedCollege()->sync($request->input('relatedCollege', []));
        $studentEvaluationReport->relatedStream()->sync($request->input('relatedStream', []));
        $studentEvaluationReport->relatedProfession()->sync($request->input('relatedProfession', []));

        return (new StudentEvaluationReportResource($studentEvaluationReport))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StudentEvaluationReport $studentEvaluationReport)
    {
        abort_if(Gate::denies('student_evaluation_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentEvaluationReport->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
