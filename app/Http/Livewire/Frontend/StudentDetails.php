<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\User;
use Auth;


class StudentDetails extends Component
{

    public $student;
    public $full_name;
    public $email;
    public $phone;
    public $address;
    public $dob;
    public $gender;
    public $school_name;
    public $class;
    public $physical_status;
    public $qualification_status;
    public $marks_type_8;
    public $marks_type_9;
    public $marks_type_10;
    public $marks_type_11;
    public $marks_english_8;
    public $marks_english_9;
    public $marks_english_10;
    public $marks_english_11;
    public $marks_science_8;
    public $marks_science_9;
    public $marks_science_10;
    public $marks_science_11;
    public $marks_math_8;
    public $marks_math_9;
    public $marks_math_10;
    public $marks_math_11;
    public $marks_aggregate_8;
    public $marks_aggregate_9;
    public $marks_aggregate_10;
    public $marks_aggregate_11;
    public $aspired_career_1;
    public $aspired_career_2;




    public function render()
    {
        return view('livewire.frontend.student-details');
    }

    public function mount()
    {
        $this->student = User::where('id', Auth::user()->id)->first();
        $this->full_name = $this->student->name;
        $this->email = $this->student->email;
        $this->phone = $this->student->phone_no;
        $this->address = $this->student->address;
        $this->dob = $this->student->date_of_birth;
        $this->gender = $this->student->gender;
        $this->school_name = $this->student->school_name ;
        $this->class = $this->student->class;
        $this->physical_status = $this->student->disability_status;
        $this->qualification_status = $this->student->qualification_status;
        $this->marks_type_8 = $this->student->marks_type_8;
        $this->marks_type_9 = $this->student->marks_type_9;
        $this->marks_type_10 = $this->student->marks_type_10;
        $this->marks_type_11 = $this->student->marks_type_11;
        $this->marks_english_8 = $this->student->marks_english_8;
        $this->marks_english_9 = $this->student->marks_english_9;
        $this->marks_english_10 = $this->student->marks_english_10;
        $this->marks_english_11 = $this->student->marks_english_11;
        $this->marks_science_8 = $this->student->marks_science_8;
        $this->marks_science_9 = $this->student->marks_science_9;
        $this->marks_science_10 = $this->student->marks_science_10;
        $this->marks_science_11 = $this->student->marks_science_11;
        $this->marks_math_8 = $this->student->marks_math_8;
        $this->marks_math_9 = $this->student->marks_math_9;
        $this->marks_math_10 = $this->student->marks_math_10;
        $this->marks_math_11 = $this->student->marks_math_11;
        $this->marks_aggregate_8 = $this->student->marks_aggregate_8;
        $this->marks_aggregate_9 = $this->student->marks_aggregate_9;
        $this->marks_aggregate_10 = $this->student->marks_aggregate_10;
        $this->marks_aggregate_11 = $this->student->marks_aggregate_11;
        $this->aspired_career_1 = $this->student->aspired_career_1;
        $this->aspired_career_2 = $this->student->aspired_career_2;

    }

    public function submit()
    {

        $this->validate([

            'phone' => 'required|numeric',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'physical_status' => 'required',
            'qualification_status' => 'required',
            'aspired_career_1' => 'required',
            'aspired_career_2' => 'required',
            'school_name' => 'required',
            'class' => 'required',
        ]);

        $update_user_profile = User::updateOrCreate(['id' => Auth::user()->id], [
            'phone_no' => $this->phone,
            'address' => $this->address,
            'date_of_birth' => $this->dob,
            'gender' => $this->gender,
            'school_name' => $this->school_name,
            'class' => $this->class,
            'disability_status' => $this->physical_status,
            'qualification_status' => $this->qualification_status,
            'marks_type_8' => $this->marks_type_8,
            'marks_type_9' => $this->marks_type_9,
            'marks_type_10'     => $this->marks_type_10,
            'marks_type_11'    => $this->marks_type_11,
            'marks_english_8'   => $this->marks_english_8,
            'marks_english_9'   => $this->marks_english_9,
            'marks_english_10' => $this->marks_english_10,
            'marks_english_11' => $this->marks_english_11,
            'marks_science_8' => $this->marks_science_8,
            'marks_science_9'   => $this->marks_science_9,
            'marks_science_10' => $this->marks_science_10,
            'marks_science_11'  => $this->marks_science_11,
            'marks_math_8'    => $this->marks_math_8,
            'marks_math_9'   => $this->marks_math_9,
            'marks_math_10' => $this->marks_math_10,
            'marks_math_11' => $this->marks_math_11,
            'marks_aggregate_8' => $this->marks_aggregate_8,
            'marks_aggregate_9' => $this->marks_aggregate_9,
            'marks_aggregate_10' => $this->marks_aggregate_10,
            'marks_aggregate_11' => $this->marks_aggregate_11,
            'aspired_career_1' => $this->aspired_career_1,
            'aspired_career_2' => $this->aspired_career_2,
        ]);

        if ($update_user_profile) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Submitted Successfully"
            ]);
        }

    }

}
