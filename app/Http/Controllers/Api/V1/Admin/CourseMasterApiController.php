<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreCourseMasterRequest;
use App\Http\Requests\UpdateCourseMasterRequest;
use App\Http\Resources\Admin\CourseMasterResource;
use App\Models\CourseMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseMasterApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('course_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseMasterResource(CourseMaster::with(['stream', 'relatedCollege'])->get());
    }

    public function store(StoreCourseMasterRequest $request)
    {
        $courseMaster = CourseMaster::create($request->validated());
        $courseMaster->relatedCollege()->sync($request->input('relatedCollege', []));
        if ($request->input('course_master_related_image', false)) {
            $courseMaster->addMedia(storage_path('tmp/uploads/' . basename($request->input('course_master_related_image'))))->toMediaCollection('course_master_related_image');
        }

        return (new CourseMasterResource($courseMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseMaster $courseMaster)
    {
        abort_if(Gate::denies('course_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseMasterResource($courseMaster->load(['stream', 'relatedCollege']));
    }

    public function update(UpdateCourseMasterRequest $request, CourseMaster $courseMaster)
    {
        $courseMaster->update($request->validated());
        $courseMaster->relatedCollege()->sync($request->input('relatedCollege', []));
        if ($request->input('course_master_related_image', false)) {
            if (! $courseMaster->course_master_related_image || $request->input('course_master_related_image') !== $courseMaster->course_master_related_image->file_name) {
                if ($courseMaster->course_master_related_image) {
                    $courseMaster->course_master_related_image->delete();
                }
                $courseMaster->addMedia(storage_path('tmp/uploads/' . basename($request->input('course_master_related_image'))))->toMediaCollection('course_master_related_image');
            }
        } elseif ($courseMaster->course_master_related_image) {
            $courseMaster->course_master_related_image->delete();
        }

        return (new CourseMasterResource($courseMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseMaster $courseMaster)
    {
        abort_if(Gate::denies('course_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
