<?php

namespace App\Http\Requests;

use App\Models\QuestionBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionBankRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('question_bank_create'),
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
            'related_question_paper_id' => [
                'integer',
                'exists:question_papers,id',
                'nullable',
            ],
            'related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'related_test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'related_ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'question_text' => [
                'string',
                'nullable',
            ],
            'question_url' => [
                'string',
                'nullable',
            ],
            'choice_1' => [
                'string',
                'nullable',
            ],
            'choice_2' => [
                'string',
                'nullable',
            ],
            'choice_3' => [
                'string',
                'nullable',
            ],
            'choice_4' => [
                'string',
                'nullable',
            ],
            'choice_5' => [
                'string',
                'nullable',
            ],
            'choice_6' => [
                'string',
                'nullable',
            ],
            'right_choice' => [
                'string',
                'nullable',
            ],
            'score_right' => [
                'string',
                'nullable',
            ],
            'score_wrong' => [
                'string',
                'nullable',
            ],
            'order_no' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
            'example_question' => [
                'boolean',
            ],
        ];
    }
}
