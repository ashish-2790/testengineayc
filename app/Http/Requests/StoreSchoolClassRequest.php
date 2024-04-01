<?php

namespace App\Http\Requests;

use App\Models\SchoolClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSchoolClassRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('school_class_create'),
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
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
