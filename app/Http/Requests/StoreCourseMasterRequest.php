<?php

namespace App\Http\Requests;

use App\Models\CourseMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('course_master_create'),
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
            'stream_id' => [
                'integer',
                'exists:stream_masters,id',
                'nullable',
            ],
            'course_name' => [
                'string',
                'nullable',
            ],
            'course_description' => [
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
            'image_url' => [
                'string',
                'nullable',
            ],
            'inactive' => [
                'boolean',
            ],
        ];
    }
}
