<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OverallStudentObservation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OverallStudentObservationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overall_student_observation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-student-observation.index');
    }

    public function create()
    {
        abort_if(Gate::denies('overall_student_observation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-student-observation.create');
    }

    public function edit(OverallStudentObservation $overallStudentObservation)
    {
        abort_if(Gate::denies('overall_student_observation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overall-student-observation.edit', compact('overallStudentObservation'));
    }

    public function show(OverallStudentObservation $overallStudentObservation)
    {
        abort_if(Gate::denies('overall_student_observation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overallStudentObservation->load('class', 'student');

        return view('admin.overall-student-observation.show', compact('overallStudentObservation'));
    }
}
