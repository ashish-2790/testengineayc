<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionBank;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionBankController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-bank.index');
    }

    public function create()
    {
        abort_if(Gate::denies('question_bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-bank.create');
    }

    public function edit(QuestionBank $questionBank)
    {
        abort_if(Gate::denies('question_bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-bank.edit', compact('questionBank'));
    }

    public function show(QuestionBank $questionBank)
    {
        abort_if(Gate::denies('question_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionBank->load('relatedQuestionPaper', 'relatedClassName', 'relatedTestType', 'relatedAbility');

        return view('admin.question-bank.show', compact('questionBank'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['question_bank_create', 'question_bank_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new QuestionBank();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
