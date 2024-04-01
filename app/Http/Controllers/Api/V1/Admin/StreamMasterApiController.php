<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStreamMasterRequest;
use App\Http\Requests\UpdateStreamMasterRequest;
use App\Http\Resources\Admin\StreamMasterResource;
use App\Models\StreamMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StreamMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stream_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StreamMasterResource(StreamMaster::with(['groupMaster'])->get());
    }

    public function store(StoreStreamMasterRequest $request)
    {
        $streamMaster = StreamMaster::create($request->validated());

        return (new StreamMasterResource($streamMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StreamMaster $streamMaster)
    {
        abort_if(Gate::denies('stream_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StreamMasterResource($streamMaster->load(['groupMaster']));
    }

    public function update(UpdateStreamMasterRequest $request, StreamMaster $streamMaster)
    {
        $streamMaster->update($request->validated());

        return (new StreamMasterResource($streamMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StreamMaster $streamMaster)
    {
        abort_if(Gate::denies('stream_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $streamMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
