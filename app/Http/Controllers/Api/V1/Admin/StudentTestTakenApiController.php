<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentTestTakenRequest;
use App\Http\Requests\UpdateStudentTestTakenRequest;
use App\Http\Resources\Admin\StudentTestTakenResource;
use App\Models\StudentTestTaken;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentTestTakenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_test_taken_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentTestTakenResource(StudentTestTaken::with(['relatedClassName', 'relatedStudent', 'relatedCreateTest'])->get());
    }

    public function store(StoreStudentTestTakenRequest $request)
    {
        $studentTestTaken = StudentTestTaken::create($request->validated());

        return (new StudentTestTakenResource($studentTestTaken))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StudentTestTaken $studentTestTaken)
    {
        abort_if(Gate::denies('student_test_taken_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentTestTakenResource($studentTestTaken->load(['relatedClassName', 'relatedStudent', 'relatedCreateTest']));
    }

    public function update(UpdateStudentTestTakenRequest $request, StudentTestTaken $studentTestTaken)
    {
        $studentTestTaken->update($request->validated());

        return (new StudentTestTakenResource($studentTestTaken))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StudentTestTaken $studentTestTaken)
    {
        abort_if(Gate::denies('student_test_taken_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentTestTaken->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
