<?php

namespace App\Http\Requests;

use App\Models\ProfessionMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProfessionMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('profession_master_create'),
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
            'profession_name' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
