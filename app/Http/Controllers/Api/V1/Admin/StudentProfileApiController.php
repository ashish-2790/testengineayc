<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentProfileRequest;
use App\Http\Requests\UpdateStudentProfileRequest;
use App\Http\Resources\Admin\StudentProfileResource;
use App\Models\StudentProfile;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentProfileResource(StudentProfile::with(['user', 'streamGroup', 'stream'])->get());
    }

    public function store(StoreStudentProfileRequest $request)
    {
        $studentProfile = StudentProfile::create($request->validated());

        return (new StudentProfileResource($studentProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StudentProfile $studentProfile)
    {
        abort_if(Gate::denies('student_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentProfileResource($studentProfile->load(['user', 'streamGroup', 'stream']));
    }

    public function update(UpdateStudentProfileRequest $request, StudentProfile $studentProfile)
    {
        $studentProfile->update($request->validated());

        return (new StudentProfileResource($studentProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StudentProfile $studentProfile)
    {
        abort_if(Gate::denies('student_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
