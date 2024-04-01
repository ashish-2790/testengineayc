<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreQuestionBankRequest;
use App\Http\Requests\UpdateQuestionBankRequest;
use App\Http\Resources\Admin\QuestionBankResource;
use App\Models\QuestionBank;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionBankApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('question_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionBankResource(QuestionBank::with(['relatedQuestionPaper', 'relatedClassName', 'relatedTestType', 'relatedAbility'])->get());
    }

    public function store(StoreQuestionBankRequest $request)
    {
        $questionBank = QuestionBank::create($request->validated());

        foreach ($request->input('question_bank_question_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_question_image');
        }

        foreach ($request->input('question_bank_choice_1_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_1_image');
        }

        foreach ($request->input('question_bank_choice_2_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_2_image');
        }

        foreach ($request->input('question_bank_choice_3_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_3_image');
        }

        foreach ($request->input('question_bank_choice_4_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_4_image');
        }

        foreach ($request->input('question_bank_choice_5_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_5_image');
        }

        foreach ($request->input('question_bank_choice_6_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_6_image');
        }

        foreach ($request->input('question_bank_right_choice_image', []) as $file) {
            $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_right_choice_image');
        }

        return (new QuestionBankResource($questionBank))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QuestionBank $questionBank)
    {
        abort_if(Gate::denies('question_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionBankResource($questionBank->load(['relatedQuestionPaper', 'relatedClassName', 'relatedTestType', 'relatedAbility']));
    }

    public function update(UpdateQuestionBankRequest $request, QuestionBank $questionBank)
    {
        $questionBank->update($request->validated());

        if (count($questionBank->question_bank_question_image) > 0) {
            foreach ($questionBank->question_bank_question_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_question_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_question_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_question_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_question_image');
            }
        }

        if (count($questionBank->question_bank_choice_1_image) > 0) {
            foreach ($questionBank->question_bank_choice_1_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_choice_1_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_choice_1_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_choice_1_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_1_image');
            }
        }

        if (count($questionBank->question_bank_choice_2_image) > 0) {
            foreach ($questionBank->question_bank_choice_2_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_choice_2_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_choice_2_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_choice_2_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_2_image');
            }
        }

        if (count($questionBank->question_bank_choice_3_image) > 0) {
            foreach ($questionBank->question_bank_choice_3_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_choice_3_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_choice_3_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_choice_3_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_3_image');
            }
        }

        if (count($questionBank->question_bank_choice_4_image) > 0) {
            foreach ($questionBank->question_bank_choice_4_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_choice_4_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_choice_4_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_choice_4_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_4_image');
            }
        }

        if (count($questionBank->question_bank_choice_5_image) > 0) {
            foreach ($questionBank->question_bank_choice_5_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_choice_5_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_choice_5_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_choice_5_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_5_image');
            }
        }

        if (count($questionBank->question_bank_choice_6_image) > 0) {
            foreach ($questionBank->question_bank_choice_6_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_choice_6_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_choice_6_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_choice_6_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_choice_6_image');
            }
        }

        if (count($questionBank->question_bank_right_choice_image) > 0) {
            foreach ($questionBank->question_bank_right_choice_image as $media) {
                if (! in_array($media->file_name, $request->input('question_bank_right_choice_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $questionBank->question_bank_right_choice_image->pluck('file_name')->toArray();
        foreach ($request->input('question_bank_right_choice_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $questionBank->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('question_bank_right_choice_image');
            }
        }

        return (new QuestionBankResource($questionBank))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QuestionBank $questionBank)
    {
        abort_if(Gate::denies('question_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionBank->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
