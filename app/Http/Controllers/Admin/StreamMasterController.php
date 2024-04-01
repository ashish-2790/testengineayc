<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StreamMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StreamMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stream_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stream-master.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stream_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stream-master.create');
    }

    public function edit(StreamMaster $streamMaster)
    {
        abort_if(Gate::denies('stream_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stream-master.edit', compact('streamMaster'));
    }

    public function show(StreamMaster $streamMaster)
    {
        abort_if(Gate::denies('stream_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $streamMaster->load('groupMaster');

        return view('admin.stream-master.show', compact('streamMaster'));
    }
}
