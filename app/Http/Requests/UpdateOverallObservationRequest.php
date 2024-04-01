<?php

namespace App\Http\Requests;

use App\Models\OverallObservation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOverallObservationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('overall_observation_edit'),
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
            'overall_sten_score' => [
                'string',
                'nullable',
            ],
            'short_description' => [
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
            'college' => [
                'array',
            ],
            'college.*.id' => [
                'integer',
                'exists:college_masters,id',
            ],
            'courses' => [
                'array',
            ],
            'courses.*.id' => [
                'integer',
                'exists:course_masters,id',
            ],
            'profession' => [
                'array',
            ],
            'profession.*.id' => [
                'integer',
                'exists:profession_masters,id',
            ],
        ];
    }
}
