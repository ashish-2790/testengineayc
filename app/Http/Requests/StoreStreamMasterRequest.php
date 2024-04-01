<?php

namespace App\Http\Requests;

use App\Models\StreamMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStreamMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('stream_master_create'),
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
            'group_master_id' => [
                'integer',
                'exists:stream_groups,id',
                'nullable',
            ],
            'stream_name' => [
                'string',
                'nullable',
            ],
            'stream_description' => [
                'string',
                'nullable',
            ],
            'icon_url' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
