<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemOptionRequest;
use App\Http\Requests\UpdateSystemOptionRequest;
use App\Http\Resources\Admin\SystemOptionResource;
use App\Models\SystemOption;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SystemOptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('system_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SystemOptionResource(SystemOption::all());
    }

    public function store(StoreSystemOptionRequest $request)
    {
        $systemOption = SystemOption::create($request->validated());

        return (new SystemOptionResource($systemOption))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SystemOption $systemOption)
    {
        abort_if(Gate::denies('system_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SystemOptionResource($systemOption);
    }

    public function update(UpdateSystemOptionRequest $request, SystemOption $systemOption)
    {
        $systemOption->update($request->validated());

        return (new SystemOptionResource($systemOption))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SystemOption $systemOption)
    {
        abort_if(Gate::denies('system_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemOption->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
