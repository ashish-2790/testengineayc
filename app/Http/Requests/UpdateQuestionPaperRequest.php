<?php

namespace App\Http\Requests;

use App\Models\QuestionPaper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionPaperRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('question_paper_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'related_class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'related_test_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'related_ability' => [
                'array',
            ],
            'related_ability.*.id' => [
                'integer',
                'exists:ability_masters,id',
            ],
            'question_paper_name' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
