<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfessionMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfessionMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('profession_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profession-master.index');
    }

    public function create()
    {
        abort_if(Gate::denies('profession_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profession-master.create');
    }

    public function edit(ProfessionMaster $professionMaster)
    {
        abort_if(Gate::denies('profession_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profession-master.edit', compact('professionMaster'));
    }

    public function show(ProfessionMaster $professionMaster)
    {
        abort_if(Gate::denies('profession_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profession-master.show', compact('professionMaster'));
    }
}
