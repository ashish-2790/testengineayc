<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StreamGroup;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StreamGroupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stream_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stream-group.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stream_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stream-group.create');
    }

    public function edit(StreamGroup $streamGroup)
    {
        abort_if(Gate::denies('stream_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stream-group.edit', compact('streamGroup'));
    }

    public function show(StreamGroup $streamGroup)
    {
        abort_if(Gate::denies('stream_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stream-group.show', compact('streamGroup'));
    }
}
