<?php

namespace App\Http\Requests;

use App\Models\ObservationTemplate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateObservationTemplateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('observation_template_edit'),
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
            'related_ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'sten_score_from' => [
                'string',
                'nullable',
            ],
            'sten_score_to' => [
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
            'stream_group' => [
                'array',
            ],
            'stream_group.*.id' => [
                'integer',
                'exists:stream_groups,id',
            ],
            'stream' => [
                'array',
            ],
            'stream.*.id' => [
                'integer',
                'exists:stream_masters,id',
            ],
            'course' => [
                'array',
            ],
            'course.*.id' => [
                'integer',
                'exists:course_masters,id',
            ],
            'college' => [
                'array',
            ],
            'college.*.id' => [
                'integer',
                'exists:college_masters,id',
            ],
            'profession' => [
                'array',
            ],
            'profession.*.id' => [
                'integer',
                'exists:profession_masters,id',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
