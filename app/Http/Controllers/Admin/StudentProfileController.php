<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentProfile;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-profile.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-profile.create');
    }

    public function edit(StudentProfile $studentProfile)
    {
        abort_if(Gate::denies('student_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-profile.edit', compact('studentProfile'));
    }

    public function show(StudentProfile $studentProfile)
    {
        abort_if(Gate::denies('student_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentProfile->load('user', 'streamGroup', 'stream');

        return view('admin.student-profile.show', compact('studentProfile'));
    }
}
