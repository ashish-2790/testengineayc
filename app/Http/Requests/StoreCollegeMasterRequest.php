<?php

namespace App\Http\Requests;

use App\Models\CollegeMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCollegeMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('college_master_create'),
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
            'college_name' => [
                'string',
                'nullable',
            ],
            'website_url' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
