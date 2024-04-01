<?php

namespace App\Http\Requests;

use App\Models\StreamGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStreamGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('stream_group_create'),
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
            'stream_group_master' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
