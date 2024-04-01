<?php

namespace App\Http\Requests;

use App\Models\StudentTestAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentTestAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('student_test_answer_create'),
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
            'related_student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'related_student_test_taken_id' => [
                'integer',
                'exists:student_test_takens,id',
                'nullable',
            ],
            'related_question_bank_id' => [
                'integer',
                'exists:question_banks,id',
                'nullable',
            ],
            'create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'answer_choice' => [
                'string',
                'nullable',
            ],
            'score' => [
                'string',
                'nullable',
            ],
            'answer_status' => [
                'nullable',
                'in:' . implode(',', array_keys(StudentTestAnswer::ANSWER_STATUS_SELECT)),
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
