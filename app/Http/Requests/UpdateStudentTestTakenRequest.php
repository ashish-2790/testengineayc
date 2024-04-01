<?php

namespace App\Http\Requests;

use App\Models\StudentTestTaken;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentTestTakenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('student_test_taken_edit'),
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
            'related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'related_student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'related_create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'studentTestTaken.started_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'studentTestTaken.ended_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'stage' => [
                'nullable',
                'in:' . implode(',', array_keys(StudentTestTaken::STAGE_SELECT)),
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
