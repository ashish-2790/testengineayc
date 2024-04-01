<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassMasterRequest;
use App\Http\Requests\UpdateClassMasterRequest;
use App\Http\Resources\Admin\ClassMasterResource;
use App\Models\ClassMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('class_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClassMasterResource(ClassMaster::all());
    }

    public function store(StoreClassMasterRequest $request)
    {
        $classMaster = ClassMaster::create($request->validated());

        return (new ClassMasterResource($classMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClassMaster $classMaster)
    {
        abort_if(Gate::denies('class_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClassMasterResource($classMaster);
    }

    public function update(UpdateClassMasterRequest $request, ClassMaster $classMaster)
    {
        $classMaster->update($request->validated());

        return (new ClassMasterResource($classMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClassMaster $classMaster)
    {
        abort_if(Gate::denies('class_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
