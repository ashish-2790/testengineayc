<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentTestAnswerRequest;
use App\Http\Requests\UpdateStudentTestAnswerRequest;
use App\Http\Resources\Admin\StudentTestAnswerResource;
use App\Models\StudentTestAnswer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentTestAnswerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_test_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentTestAnswerResource(StudentTestAnswer::with(['relatedStudent', 'relatedStudentTestTaken', 'relatedQuestionBank', 'createTest'])->get());
    }

    public function store(StoreStudentTestAnswerRequest $request)
    {
        $studentTestAnswer = StudentTestAnswer::create($request->validated());

        return (new StudentTestAnswerResource($studentTestAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StudentTestAnswer $studentTestAnswer)
    {
        abort_if(Gate::denies('student_test_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentTestAnswerResource($studentTestAnswer->load(['relatedStudent', 'relatedStudentTestTaken', 'relatedQuestionBank', 'createTest']));
    }

    public function update(UpdateStudentTestAnswerRequest $request, StudentTestAnswer $studentTestAnswer)
    {
        $studentTestAnswer->update($request->validated());

        return (new StudentTestAnswerResource($studentTestAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StudentTestAnswer $studentTestAnswer)
    {
        abort_if(Gate::denies('student_test_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentTestAnswer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
