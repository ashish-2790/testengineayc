<?php

namespace App\Http\Requests;

use App\Models\AbilityWiseResult;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAbilityWiseResultRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('ability_wise_result_create'),
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
            'student_test_taken_id' => [
                'integer',
                'exists:student_test_takens,id',
                'nullable',
            ],
            'overall_result_id' => [
                'integer',
                'exists:overall_result_reports,id',
                'nullable',
            ],
            'ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'ability_raw_score' => [
                'string',
                'nullable',
            ],
            'ability_sten_score' => [
                'string',
                'nullable',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'report_1' => [
                'string',
                'nullable',
            ],
            'report_2' => [
                'string',
                'nullable',
            ],
            'report_3' => [
                'string',
                'nullable',
            ],
            'report_4' => [
                'string',
                'nullable',
            ],
            'report_5' => [
                'string',
                'nullable',
            ],
            'report_6' => [
                'string',
                'nullable',
            ],
        ];
    }
}
