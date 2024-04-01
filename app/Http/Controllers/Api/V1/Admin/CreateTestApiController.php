<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreateTestRequest;
use App\Http\Requests\UpdateCreateTestRequest;
use App\Http\Resources\Admin\CreateTestResource;
use App\Models\CreateTest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateTestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('create_test_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CreateTestResource(CreateTest::with(['relatedQuestionPaper', 'relatedClass', 'relatedTestType'])->get());
    }

    public function store(StoreCreateTestRequest $request)
    {
        $createTest = CreateTest::create($request->validated());

        return (new CreateTestResource($createTest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CreateTest $createTest)
    {
        abort_if(Gate::denies('create_test_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CreateTestResource($createTest->load(['relatedQuestionPaper', 'relatedClass', 'relatedTestType']));
    }

    public function update(UpdateCreateTestRequest $request, CreateTest $createTest)
    {
        $createTest->update($request->validated());

        return (new CreateTestResource($createTest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CreateTest $createTest)
    {
        abort_if(Gate::denies('create_test_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createTest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
