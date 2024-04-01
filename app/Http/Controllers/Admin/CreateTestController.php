<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CreateTest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateTestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('create_test_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.create-test.index');
    }

    public function create()
    {
        abort_if(Gate::denies('create_test_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.create-test.create');
    }

    public function edit(CreateTest $createTest)
    {
        abort_if(Gate::denies('create_test_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.create-test.edit', compact('createTest'));
    }

    public function show(CreateTest $createTest)
    {
        abort_if(Gate::denies('create_test_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createTest->load('relatedQuestionPaper', 'relatedClass', 'relatedTestType');

        return view('admin.create-test.show', compact('createTest'));
    }
}
