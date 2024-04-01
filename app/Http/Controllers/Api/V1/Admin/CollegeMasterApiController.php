<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollegeMasterRequest;
use App\Http\Requests\UpdateCollegeMasterRequest;
use App\Http\Resources\Admin\CollegeMasterResource;
use App\Models\CollegeMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollegeMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('college_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollegeMasterResource(CollegeMaster::all());
    }

    public function store(StoreCollegeMasterRequest $request)
    {
        $collegeMaster = CollegeMaster::create($request->validated());

        return (new CollegeMasterResource($collegeMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CollegeMaster $collegeMaster)
    {
        abort_if(Gate::denies('college_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollegeMasterResource($collegeMaster);
    }

    public function update(UpdateCollegeMasterRequest $request, CollegeMaster $collegeMaster)
    {
        $collegeMaster->update($request->validated());

        return (new CollegeMasterResource($collegeMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CollegeMaster $collegeMaster)
    {
        abort_if(Gate::denies('college_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collegeMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
