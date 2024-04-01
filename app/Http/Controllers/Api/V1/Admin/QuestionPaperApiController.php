<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionPaperRequest;
use App\Http\Requests\UpdateQuestionPaperRequest;
use App\Http\Resources\Admin\QuestionPaperResource;
use App\Models\QuestionPaper;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionPaperApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionPaperResource(QuestionPaper::with(['relatedClass', 'relatedTest', 'relatedAbility'])->get());
    }

    public function store(StoreQuestionPaperRequest $request)
    {
        $questionPaper = QuestionPaper::create($request->validated());
        $questionPaper->relatedAbility()->sync($request->input('relatedAbility', []));

        return (new QuestionPaperResource($questionPaper))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QuestionPaper $questionPaper)
    {
        abort_if(Gate::denies('question_paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionPaperResource($questionPaper->load(['relatedClass', 'relatedTest', 'relatedAbility']));
    }

    public function update(UpdateQuestionPaperRequest $request, QuestionPaper $questionPaper)
    {
        $questionPaper->update($request->validated());
        $questionPaper->relatedAbility()->sync($request->input('relatedAbility', []));

        return (new QuestionPaperResource($questionPaper))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QuestionPaper $questionPaper)
    {
        abort_if(Gate::denies('question_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionPaper->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
