<?php

namespace App\Http\Requests;

use App\Models\StudentProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('student_profile_edit'),
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
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'disability' => [
                'nullable',
                'in:' . implode(',', array_keys(StudentProfile::DISABILITY_RADIO)),
            ],
            'qualification_status' => [
                'nullable',
                'in:' . implode(',', array_keys(StudentProfile::QUALIFICATION_STATUS_RADIO)),
            ],
            'stream_group_id' => [
                'integer',
                'exists:stream_groups,id',
                'nullable',
            ],
            'stream_id' => [
                'integer',
                'exists:stream_masters,id',
                'nullable',
            ],
            'percent_10' => [
                'string',
                'nullable',
            ],
            'percent_11' => [
                'string',
                'nullable',
            ],
            'percent_12' => [
                'string',
                'nullable',
            ],
            'percent_graduation' => [
                'string',
                'nullable',
            ],
        ];
    }
}
