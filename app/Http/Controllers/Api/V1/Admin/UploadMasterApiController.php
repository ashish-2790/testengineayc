<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreUploadMasterRequest;
use App\Http\Requests\UpdateUploadMasterRequest;
use App\Http\Resources\Admin\UploadMasterResource;
use App\Models\UploadMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadMasterApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('upload_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UploadMasterResource(UploadMaster::all());
    }

    public function store(StoreUploadMasterRequest $request)
    {
        $uploadMaster = UploadMaster::create($request->validated());

        foreach ($request->input('upload_master_related_doc', []) as $file) {
            $uploadMaster->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('upload_master_related_doc');
        }

        return (new UploadMasterResource($uploadMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UploadMaster $uploadMaster)
    {
        abort_if(Gate::denies('upload_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UploadMasterResource($uploadMaster);
    }

    public function update(UpdateUploadMasterRequest $request, UploadMaster $uploadMaster)
    {
        $uploadMaster->update($request->validated());

        if (count($uploadMaster->upload_master_related_doc) > 0) {
            foreach ($uploadMaster->upload_master_related_doc as $media) {
                if (! in_array($media->file_name, $request->input('upload_master_related_doc', []))) {
                    $media->delete();
                }
            }
        }
        $media = $uploadMaster->upload_master_related_doc->pluck('file_name')->toArray();
        foreach ($request->input('upload_master_related_doc', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $uploadMaster->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('upload_master_related_doc');
            }
        }

        return (new UploadMasterResource($uploadMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UploadMaster $uploadMaster)
    {
        abort_if(Gate::denies('upload_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uploadMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
