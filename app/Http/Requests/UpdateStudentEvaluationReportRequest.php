<?php

namespace App\Http\Requests;

use App\Models\StudentEvaluationReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentEvaluationReportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('student_evaluation_report_edit'),
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
            'related_student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
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
            'related_ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'related_observation_template_id' => [
                'integer',
                'exists:observation_templates,id',
                'nullable',
            ],
            'sten_score' => [
                'string',
                'nullable',
            ],
            'observation_1' => [
                'string',
                'nullable',
            ],
            'observation_2' => [
                'string',
                'nullable',
            ],
            'observation_3' => [
                'string',
                'nullable',
            ],
            'observation_4' => [
                'string',
                'nullable',
            ],
            'observation_5' => [
                'string',
                'nullable',
            ],
            'observation_6' => [
                'string',
                'nullable',
            ],
            'related_college' => [
                'array',
            ],
            'related_college.*.id' => [
                'integer',
                'exists:college_masters,id',
            ],
            'related_stream' => [
                'array',
            ],
            'related_stream.*.id' => [
                'integer',
                'exists:stream_masters,id',
            ],
            'related_profession' => [
                'array',
            ],
            'related_profession.*.id' => [
                'integer',
                'exists:profession_masters,id',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
