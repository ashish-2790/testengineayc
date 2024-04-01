<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionPaper;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionPaperController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-paper.index');
    }

    public function create()
    {
        abort_if(Gate::denies('question_paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-paper.create');
    }

    public function edit(QuestionPaper $questionPaper)
    {
        abort_if(Gate::denies('question_paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-paper.edit', compact('questionPaper'));
    }

    public function show(QuestionPaper $questionPaper)
    {
        abort_if(Gate::denies('question_paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionPaper->load('relatedClass', 'relatedTest', 'relatedAbility');

        return view('admin.question-paper.show', compact('questionPaper'));
    }
}
