<?php

namespace App\Http\Requests;

use App\Models\AbilityWiseObservation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAbilityWiseObservationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('ability_wise_observation_create'),
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
            'overall_observation_id' => [
                'integer',
                'exists:overall_observations,id',
                'nullable',
            ],
            'ability_result_id' => [
                'integer',
                'exists:ability_wise_results,id',
                'nullable',
            ],
            'ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'ability_sten_score' => [
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
            'stream_master' => [
                'array',
            ],
            'stream_master.*.id' => [
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
            'course' => [
                'array',
            ],
            'course.*.id' => [
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
