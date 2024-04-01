<?php

namespace App\Http\Requests;

use App\Models\OverallStudentObservation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOverallStudentObservationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('overall_student_observation_create'),
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
            'class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'detailed_observation_1' => [
                'string',
                'nullable',
            ],
            'detailed_observation_2' => [
                'string',
                'nullable',
            ],
            'detailed_observation_3' => [
                'string',
                'nullable',
            ],
            'detailed_observation_4' => [
                'string',
                'nullable',
            ],
            'detailed_observation_5' => [
                'string',
                'nullable',
            ],
        ];
    }
}
