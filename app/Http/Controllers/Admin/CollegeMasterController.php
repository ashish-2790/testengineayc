<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollegeMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('college_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-master.index');
    }

    public function create()
    {
        abort_if(Gate::denies('college_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-master.create');
    }

    public function edit(CollegeMaster $collegeMaster)
    {
        abort_if(Gate::denies('college_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-master.edit', compact('collegeMaster'));
    }

    public function show(CollegeMaster $collegeMaster)
    {
        abort_if(Gate::denies('college_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-master.show', compact('collegeMaster'));
    }
}
