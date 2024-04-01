<?php

namespace App\Http\Requests;

use App\Models\School;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSchoolRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('school_create'),
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
            'class_name' => [
                'array',
            ],
            'class_name.*.id' => [
                'integer',
                'exists:class_masters,id',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'email' => [
                'email:rfc',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'phone_no' => [
                'string',
                'nullable',
            ],
            'school_code' => [
                'string',
                'nullable',
            ],
            'affiliation' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
