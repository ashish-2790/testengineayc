<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolLicenceRequest;
use App\Http\Requests\UpdateSchoolLicenceRequest;
use App\Http\Resources\Admin\SchoolLicenceResource;
use App\Models\SchoolLicence;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolLicenceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('school_licence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolLicenceResource(SchoolLicence::with(['schoolName', 'relatedClassName', 'relatedTestType'])->get());
    }

    public function store(StoreSchoolLicenceRequest $request)
    {
        $schoolLicence = SchoolLicence::create($request->validated());

        return (new SchoolLicenceResource($schoolLicence))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SchoolLicence $schoolLicence)
    {
        abort_if(Gate::denies('school_licence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolLicenceResource($schoolLicence->load(['schoolName', 'relatedClassName', 'relatedTestType']));
    }

    public function update(UpdateSchoolLicenceRequest $request, SchoolLicence $schoolLicence)
    {
        $schoolLicence->update($request->validated());

        return (new SchoolLicenceResource($schoolLicence))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SchoolLicence $schoolLicence)
    {
        abort_if(Gate::denies('school_licence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schoolLicence->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
