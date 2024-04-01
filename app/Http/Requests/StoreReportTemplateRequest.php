<?php

namespace App\Http\Requests;

use App\Models\ReportTemplate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportTemplateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('report_template_create'),
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
            'test_sten_score_from' => [
                'string',
                'nullable',
            ],
            'test_sten_score_to' => [
                'string',
                'nullable',
            ],
            'short_review' => [
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
