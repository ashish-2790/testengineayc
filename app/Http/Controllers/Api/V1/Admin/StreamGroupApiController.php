<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStreamGroupRequest;
use App\Http\Requests\UpdateStreamGroupRequest;
use App\Http\Resources\Admin\StreamGroupResource;
use App\Models\StreamGroup;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StreamGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stream_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StreamGroupResource(StreamGroup::all());
    }

    public function store(StoreStreamGroupRequest $request)
    {
        $streamGroup = StreamGroup::create($request->validated());

        return (new StreamGroupResource($streamGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StreamGroup $streamGroup)
    {
        abort_if(Gate::denies('stream_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StreamGroupResource($streamGroup);
    }

    public function update(UpdateStreamGroupRequest $request, StreamGroup $streamGroup)
    {
        $streamGroup->update($request->validated());

        return (new StreamGroupResource($streamGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StreamGroup $streamGroup)
    {
        abort_if(Gate::denies('stream_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $streamGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
