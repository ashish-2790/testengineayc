<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemOption;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SystemOptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('system_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.system-option.index');
    }

    public function create()
    {
        abort_if(Gate::denies('system_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.system-option.create');
    }

    public function edit(SystemOption $systemOption)
    {
        abort_if(Gate::denies('system_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.system-option.edit', compact('systemOption'));
    }

    public function show(SystemOption $systemOption)
    {
        abort_if(Gate::denies('system_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.system-option.show', compact('systemOption'));
    }
}
