<?php

namespace App\Http\Requests;

use App\Models\CreateTest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCreateTestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('create_test_create'),
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
            'instruction' => [
                'string',
                'nullable',
            ],
            'video_url' => [
                'string',
                'nullable',
            ],
            'related_question_paper_id' => [
                'integer',
                'exists:question_papers,id',
                'nullable',
            ],
            'createTest.valid_from' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'createTest.valid_to' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'related_class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'related_test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'max_student_join' => [
                'string',
                'nullable',
            ],
            'maximum_score' => [
                'string',
                'nullable',
            ],
            'minimum_score' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
