<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UploadMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('upload_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upload-master.index');
    }

    public function create()
    {
        abort_if(Gate::denies('upload_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upload-master.create');
    }

    public function edit(UploadMaster $uploadMaster)
    {
        abort_if(Gate::denies('upload_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upload-master.edit', compact('uploadMaster'));
    }

    public function show(UploadMaster $uploadMaster)
    {
        abort_if(Gate::denies('upload_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upload-master.show', compact('uploadMaster'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['upload_master_create', 'upload_master_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new UploadMaster();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
