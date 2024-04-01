<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseMaster;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course-master.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course-master.create');
    }

    public function edit(CourseMaster $courseMaster)
    {
        abort_if(Gate::denies('course_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course-master.edit', compact('courseMaster'));
    }

    public function show(CourseMaster $courseMaster)
    {
        abort_if(Gate::denies('course_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseMaster->load('stream', 'relatedCollege');

        return view('admin.course-master.show', compact('courseMaster'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['course_master_create', 'course_master_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new CourseMaster();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
