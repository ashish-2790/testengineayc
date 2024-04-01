<?php

namespace App\Http\Requests;

use App\Models\SchoolLicence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSchoolLicenceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('school_licence_create'),
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
            'school_name_id' => [
                'integer',
                'exists:schools,id',
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
            'student_count' => [
                'string',
                'nullable',
            ],
            'valid_from' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'valid_to' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
