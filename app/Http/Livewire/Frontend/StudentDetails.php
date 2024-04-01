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
    public $school_id;
    public $class_id;
    public $



    public function render()
    {
        return view('livewire.frontend.student-details');
    }

    public function mount()
    {
        $this->student = User::where('id', Auth::user()->id)->first();
    }


}
