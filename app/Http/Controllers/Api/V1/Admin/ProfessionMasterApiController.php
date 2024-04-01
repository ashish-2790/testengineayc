<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfessionMasterRequest;
use App\Http\Requests\UpdateProfessionMasterRequest;
use App\Http\Resources\Admin\ProfessionMasterResource;
use App\Models\ProfessionMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfessionMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('profession_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfessionMasterResource(ProfessionMaster::all());
    }

    public function store(StoreProfessionMasterRequest $request)
    {
        $professionMaster = ProfessionMaster::create($request->validated());

        return (new ProfessionMasterResource($professionMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProfessionMaster $professionMaster)
    {
        abort_if(Gate::denies('profession_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfessionMasterResource($professionMaster);
    }

    public function update(UpdateProfessionMasterRequest $request, ProfessionMaster $professionMaster)
    {
        $professionMaster->update($request->validated());

        return (new ProfessionMasterResource($professionMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProfessionMaster $professionMaster)
    {
        abort_if(Gate::denies('profession_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $professionMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
