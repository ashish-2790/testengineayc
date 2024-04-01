<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('class_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.class-master.index');
    }

    public function create()
    {
        abort_if(Gate::denies('class_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.class-master.create');
    }

    public function edit(ClassMaster $classMaster)
    {
        abort_if(Gate::denies('class_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.class-master.edit', compact('classMaster'));
    }

    public function show(ClassMaster $classMaster)
    {
        abort_if(Gate::denies('class_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.class-master.show', compact('classMaster'));
    }
}
