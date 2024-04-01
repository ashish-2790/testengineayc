<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolClassesStudentRequest;
use App\Http\Requests\UpdateSchoolClassesStudentRequest;
use App\Http\Resources\Admin\SchoolClassesStudentResource;
use App\Models\SchoolClassesStudent;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolClassesStudentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('school_classes_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolClassesStudentResource(SchoolClassesStudent::with(['schoolName', 'className', 'userName'])->get());
    }

    public function store(StoreSchoolClassesStudentRequest $request)
    {
        $schoolClassesStudent = SchoolClassesStudent::create($request->validated());

        return (new SchoolClassesStudentResource($schoolClassesStudent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SchoolClassesStudent $schoolClassesStudent)
    {
        abort_if(Gate::denies('school_classes_student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolClassesStudentResource($schoolClassesStudent->load(['schoolName', 'className', 'userName']));
    }

    public function update(UpdateSchoolClassesStudentRequest $request, SchoolClassesStudent $schoolClassesStudent)
    {
        $schoolClassesStudent->update($request->validated());

        return (new SchoolClassesStudentResource($schoolClassesStudent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SchoolClassesStudent $schoolClassesStudent)
    {
        abort_if(Gate::denies('school_classes_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schoolClassesStudent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
