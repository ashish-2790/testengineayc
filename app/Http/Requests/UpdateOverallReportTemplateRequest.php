<?php

namespace App\Http\Requests;

use App\Models\OverallReportTemplate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOverallReportTemplateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('overall_report_template_edit'),
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
            'class' => [
                'array',
            ],
            'class.*.id' => [
                'integer',
                'exists:class_masters,id',
            ],
            'test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'overall_stenscore_from' => [
                'string',
                'nullable',
            ],
            'overall_stenscore_to' => [
                'string',
                'nullable',
            ],
            'short_review' => [
                'string',
                'nullable',
            ],
            'detailed_report_1' => [
                'string',
                'nullable',
            ],
            'detailed_report_2' => [
                'string',
                'nullable',
            ],
            'detailed_report_3' => [
                'string',
                'nullable',
            ],
            'detailed_report_4' => [
                'string',
                'nullable',
            ],
            'detailed_report_5' => [
                'string',
                'nullable',
            ],
            'detailed_report_6' => [
                'string',
                'nullable',
            ],
            'ability_1_from' => [
                'string',
                'nullable',
            ],
            'ability_1_to' => [
                'string',
                'nullable',
            ],
            'ability_2_from' => [
                'string',
                'nullable',
            ],
            'ability_2_to' => [
                'string',
                'nullable',
            ],
            'ability_3_from' => [
                'string',
                'nullable',
            ],
            'ability_3_to' => [
                'string',
                'nullable',
            ],
            'ability_4_from' => [
                'string',
                'nullable',
            ],
            'ability_4_to' => [
                'string',
                'nullable',
            ],
            'ability_5_from' => [
                'string',
                'nullable',
            ],
            'ability_5_to' => [
                'string',
                'nullable',
            ],
            'ability_6_from' => [
                'string',
                'nullable',
            ],
            'ability_6_to' => [
                'string',
                'nullable',
            ],
            'ability_7_from' => [
                'string',
                'nullable',
            ],
            'ability_7_to' => [
                'string',
                'nullable',
            ],
            'ability_8_from' => [
                'string',
                'nullable',
            ],
            'ability_8_to' => [
                'string',
                'nullable',
            ],
            'ability_9_from' => [
                'string',
                'nullable',
            ],
            'ability_9_to' => [
                'string',
                'nullable',
            ],
            'ability_10_from' => [
                'string',
                'nullable',
            ],
            'ability_10_to' => [
                'string',
                'nullable',
            ],
            'ability_11_from' => [
                'string',
                'nullable',
            ],
            'ability_11_to' => [
                'string',
                'nullable',
            ],
            'ability_12_from' => [
                'string',
                'nullable',
            ],
            'ability_12_to' => [
                'string',
                'nullable',
            ],
            'ability_13_from' => [
                'string',
                'nullable',
            ],
            'ability_13_to' => [
                'string',
                'nullable',
            ],
            'ability_14_from' => [
                'string',
                'nullable',
            ],
            'ability_14_to' => [
                'string',
                'nullable',
            ],
            'ability_15_from' => [
                'string',
                'nullable',
            ],
            'ability_15_to' => [
                'string',
                'nullable',
            ],
            'ability_16_from' => [
                'string',
                'nullable',
            ],
            'ability_16_to' => [
                'string',
                'nullable',
            ],
            'ability_17_from' => [
                'string',
                'nullable',
            ],
            'ability_17_to' => [
                'string',
                'nullable',
            ],
            'ability_18_from' => [
                'string',
                'nullable',
            ],
            'ability_18_to' => [
                'string',
                'nullable',
            ],
            'ability_19_from' => [
                'string',
                'nullable',
            ],
            'ability_19_to' => [
                'string',
                'nullable',
            ],
            'ability_20_from' => [
                'string',
                'nullable',
            ],
            'ability_20_to' => [
                'string',
                'nullable',
            ],
            'ability_21_from' => [
                'string',
                'nullable',
            ],
            'ability_21_to' => [
                'string',
                'nullable',
            ],
            'ability_22_from' => [
                'string',
                'nullable',
            ],
            'ability_22_to' => [
                'string',
                'nullable',
            ],
            'ability_23_from' => [
                'string',
                'nullable',
            ],
            'ability_23_to' => [
                'string',
                'nullable',
            ],
            'ability_24_from' => [
                'string',
                'nullable',
            ],
            'ability_24_to' => [
                'string',
                'nullable',
            ],
            'ability_25_from' => [
                'string',
                'nullable',
            ],
            'ability_25_to' => [
                'string',
                'nullable',
            ],
        ];
    }
}
