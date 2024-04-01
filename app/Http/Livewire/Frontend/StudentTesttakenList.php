<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CreateTest;
use App\Models\User;
use Livewire\Component;
use App\Models\StudentTestTaken;

class StudentTesttakenList extends Component
{
    public $test_takens;
    public $get_exam_list;
    public $user_id;

    public function mount()
    {
        if (isset($_GET['user_id']))
            $this->user_id = $_GET['user_id'];
        else
            $this->user_id = Auth::user()->id;

        $get_user_class = User::where('id', $this->user_id)->first();

        $this->get_exam_list = StudentTestTaken::with('relatedCreateTest','relatedCreateTest.relatedTestType')
            ->where('related_student_id', $this->user_id)
            ->where('related_class_name_id', $get_user_class->related_class_name_id)
            ->get();

    //    dd($this->get_exam_list);

    }


    public function render()
    {
        return view('livewire.frontend.student-testtaken-list');
    }
}
