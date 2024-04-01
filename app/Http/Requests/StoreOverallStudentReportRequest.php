<?php

namespace App\Http\Requests;

use App\Models\OverallStudentReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOverallStudentReportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('overall_student_report_create'),
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
            'class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'overall_sten_score' => [
                'string',
                'nullable',
            ],
            'short_description' => [
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
        ];
    }
}
