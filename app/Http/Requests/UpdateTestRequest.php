<?php

namespace App\Http\Requests;

use App\Models\Test;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('test_edit'),
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
            'test_name' => [
                'string',
                'nullable',
            ],
            'order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'inactive' => [
                'boolean',
            ],
            'class_name' => [
                'array',
            ],
            'class_name.*.id' => [
                'integer',
                'exists:class_masters,id',
            ],
        ];
    }
}
