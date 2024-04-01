<?php

namespace App\Http\Requests;

use App\Models\StudentMainReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentMainReportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('student_main_report_edit'),
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
            'related_student_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
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
            'create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'related_report_template_id' => [
                'integer',
                'exists:report_templates,id',
                'nullable',
            ],
            'sten_score' => [
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
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
