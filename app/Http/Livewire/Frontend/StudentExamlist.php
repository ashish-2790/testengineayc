<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\User;
use App\Models\CreateTest;
use App\Models\StudentTestTaken;
use App\Models\SchoolLicence;
use Auth;
use App\Events\SendIdEvent;
use Illuminate\Support\Facades\Crypt;


class StudentExamlist extends Component
{
    public $get_exam_list;
    public $current_date_time;
    public $get_user_class;
    public $redirect_profile = false;

    public function render()
    {
        return view('livewire.frontend.student-examlist');
    }


    public function mount()
    {
        $user_id = Auth::id();

        $this->current_date_time = now();

        $this->get_user_class = User::find($user_id);

        $check_user_school = Auth::user()->related_school_name_id;

        if ($this->get_user_class->gender == null || $this->get_user_class->aspired_career_1 == null) {
            session()->flash('error', 'Please fill your profile details first.');
            $this->redirect_profile = true;
        }

        $check_school_validity = SchoolLicence::where('school_name_id', $check_user_school)
            ->where('related_class_name_id', $this->get_user_class->related_class_name_id)
            ->where('valid_from', '<=', $this->current_date_time)
            ->where('valid_to', '>=', $this->current_date_time)
            ->exists();


        if (!$check_school_validity) {
            $this->get_exam_list = [];
        } else {
            $this->get_exam_list = CreateTest::with(['relatedQuestionPaper'])
                ->where('related_class_id', $this->get_user_class->related_class_name_id)
                ->where('valid_from', '<=', $this->current_date_time)
                ->where('valid_to', '>=', $this->current_date_time)
                ->get();


            foreach ($this->get_exam_list as $key => $value) {
                $get_student_test_taken = StudentTestTaken::where('related_student_id', $user_id)
                    ->where('related_create_test_id', $value->id)
                    ->first();
                if ($get_student_test_taken) {
                    $this->get_exam_list[$key]['test_taken'] = true;
                    $this->get_exam_list[$key]['stage'] = $get_student_test_taken->stage;
                    $this->get_exam_list[$key]['report'] = $get_student_test_taken->udf_5;
                    $this->get_exam_list[$key]['report_id'] = $get_student_test_taken->id;
                } else {
                    $this->get_exam_list[$key]['test_taken'] = false;
                    $this->get_exam_list[$key]['test_taken'] = false;
                    $this->get_exam_list[$key]['report'] = false;
                    $this->get_exam_list[$key]['report_id'] = false;

                }
            }

        }

    }

    public function wireInit()
    {
        if ($this->get_user_class->school_name == null) {
            dd('Please select your school');
            return redirect()->route('student-detail');
        }
    }


}
