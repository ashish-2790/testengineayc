<?php

namespace App\Http\Requests;

use App\Models\AbilityMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAbilityMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('ability_master_create'),
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
            'related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'related_test_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'ability_name' => [
                'string',
                'nullable',
            ],
            'ability_instruction' => [
                'string',
                'nullable',
            ],
        ];
    }
}
