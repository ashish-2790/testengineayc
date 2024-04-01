<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentResultRequest;
use App\Http\Requests\UpdateStudentResultRequest;
use App\Http\Resources\Admin\StudentResultResource;
use App\Models\StudentResult;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentResultApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentResultResource(StudentResult::with(['relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest'])->get());
    }

    public function store(StoreStudentResultRequest $request)
    {
        $studentResult = StudentResult::create($request->validated());

        return (new StudentResultResource($studentResult))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StudentResult $studentResult)
    {
        abort_if(Gate::denies('student_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentResultResource($studentResult->load(['relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest']));
    }

    public function update(UpdateStudentResultRequest $request, StudentResult $studentResult)
    {
        $studentResult->update($request->validated());

        return (new StudentResultResource($studentResult))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StudentResult $studentResult)
    {
        abort_if(Gate::denies('student_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentResult->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
