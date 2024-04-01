<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\StudentTestAnswer;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

if(!function_exists('getQuestionList')){
     function getQuestionList($abilityType,$student_test_takenid)
    {
        $user_id = Auth::user()->id;

        $questions_list = StudentTestAnswer::with('relatedQuestionBank')
            ->where('related_student_id', $user_id)
            ->where('related_student_test_taken_id', $student_test_takenid)
            ->whereHas('relatedQuestionBank', function ($query) use ($abilityType) {
                $query->where('related_ability_id', $abilityType);
            })
            ->orderByRaw('CAST(udf_1 AS UNSIGNED) ASC')
            ->get();

        return $questions_list;


    }
}







