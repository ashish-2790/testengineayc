<?php

namespace App\Http\Requests;

use App\Models\SchoolClassesStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSchoolClassesStudentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('school_classes_student_create'),
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
            'class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'user_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
