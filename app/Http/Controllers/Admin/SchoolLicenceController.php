<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolLicence;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolLicenceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('school_licence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.school-licence.index');
    }

    public function create()
    {
        abort_if(Gate::denies('school_licence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.school-licence.create');
    }

    public function edit(SchoolLicence $schoolLicence)
    {
        abort_if(Gate::denies('school_licence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.school-licence.edit', compact('schoolLicence'));
    }

    public function show(SchoolLicence $schoolLicence)
    {
        abort_if(Gate::denies('school_licence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schoolLicence->load('schoolName', 'relatedClassName', 'relatedTestType');

        return view('admin.school-licence.show', compact('schoolLicence'));
    }
}
