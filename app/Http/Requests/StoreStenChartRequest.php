<?php

namespace App\Http\Requests;

use App\Models\StenChart;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStenChartRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('sten_chart_create'),
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
            'related_test_name_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'related_ability_name_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'related_class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'max_score_raw' => [
                'string',
                'nullable',
            ],
            'score_raw_from' => [
                'string',
                'nullable',
            ],
            'score_raw_to' => [
                'string',
                'nullable',
            ],
            'sten_score' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
