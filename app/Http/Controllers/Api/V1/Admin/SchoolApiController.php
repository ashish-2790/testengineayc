<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Resources\Admin\SchoolResource;
use App\Models\School;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('school_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolResource(School::with(['className'])->get());
    }

    public function store(StoreSchoolRequest $request)
    {
        $school = School::create($request->validated());
        $school->className()->sync($request->input('className', []));
        if ($request->input('school_logo_square', false)) {
            $school->addMedia(storage_path('tmp/uploads/' . basename($request->input('school_logo_square'))))->toMediaCollection('school_logo_square');
        }

        if ($request->input('school_logo_wide', false)) {
            $school->addMedia(storage_path('tmp/uploads/' . basename($request->input('school_logo_wide'))))->toMediaCollection('school_logo_wide');
        }

        return (new SchoolResource($school))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(School $school)
    {
        abort_if(Gate::denies('school_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SchoolResource($school->load(['className']));
    }

    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->update($request->validated());
        $school->className()->sync($request->input('className', []));
        if ($request->input('school_logo_square', false)) {
            if (! $school->school_logo_square || $request->input('school_logo_square') !== $school->school_logo_square->file_name) {
                if ($school->school_logo_square) {
                    $school->school_logo_square->delete();
                }
                $school->addMedia(storage_path('tmp/uploads/' . basename($request->input('school_logo_square'))))->toMediaCollection('school_logo_square');
            }
        } elseif ($school->school_logo_square) {
            $school->school_logo_square->delete();
        }

        if ($request->input('school_logo_wide', false)) {
            if (! $school->school_logo_wide || $request->input('school_logo_wide') !== $school->school_logo_wide->file_name) {
                if ($school->school_logo_wide) {
                    $school->school_logo_wide->delete();
                }
                $school->addMedia(storage_path('tmp/uploads/' . basename($request->input('school_logo_wide'))))->toMediaCollection('school_logo_wide');
            }
        } elseif ($school->school_logo_wide) {
            $school->school_logo_wide->delete();
        }

        return (new SchoolResource($school))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(School $school)
    {
        abort_if(Gate::denies('school_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $school->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
