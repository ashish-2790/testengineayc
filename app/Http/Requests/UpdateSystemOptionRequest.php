<?php

namespace App\Http\Requests;

use App\Models\SystemOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSystemOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('system_option_edit'),
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
            'option_name' => [
                'string',
                'nullable',
            ],
            'option_value' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
