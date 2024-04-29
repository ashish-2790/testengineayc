<?php

namespace App\Http\Livewire\User;

use App\Models\ClassMaster;
use App\Models\Role;
use App\Models\School;
use App\Models\SchoolLicence;
use App\Models\StreamGroup;
use App\Models\StreamMaster;
use App\Models\Test;
use App\Models\User;
use App\Models\AbilityMaster;
use Livewire\Component;
use Auth;


class Create extends Component
{
    public User $user;

    public $logged_in_user_role;

    public $current_date;

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public array $related_test_type = [];

    public function mount(User $user)
    {
        $this->user = $user;

        $this->logged_in_user_role = Auth::user()->roles->first()->title;

        $this->initListsForFields();

        $this->current_date = date('Y-m-d');
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_school_name'] = School::pluck('name', 'id')->toArray();
        $this->listsForFields['related_class_name'] = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_type'] = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['roles'] = Role::pluck('title', 'id')->toArray();
        $this->listsForFields['gender'] = $this->user::GENDER_RADIO;
        $this->listsForFields['disability_status'] = $this->user::DISABILITY_STATUS_RADIO;
        $this->listsForFields['qualification_status'] = $this->user::QUALIFICATION_STATUS_RADIO;
        $this->listsForFields['stream_group'] = StreamGroup::pluck('stream_group_master', 'id')->toArray();
        $this->listsForFields['stream'] = StreamMaster::pluck('stream_name', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.user.create');
    }

    public function submit()
    {
        if ($this->logged_in_user_role == 'School') {
            $this->user->password = '123456';
            $this->user->related_school_name_id = Auth::user()->related_school_name_id;
            $this->roles = [4];
        }



        if ($this->roles == [4]) {

            $exceededAbilities = []; // Initialize an array to store exceeded abilities

            // Iterate through each related test type and remove the test_id if license strength is less than or equal to total students registered
            for ($key = count($this->related_test_type) - 1; $key >= 0; $key--) {

                $testId = $this->related_test_type[$key];

                $testTypeCount = User::with(['relatedTestType'])->where('related_school_name_id', Auth::user()->related_school_name_id)
                    ->where('related_class_name_id', $this->user->related_class_name_id)
                    ->whereHas('relatedTestType', function ($q) use ($testId) {
                        $q->where('test_id', $testId);
                    })
                    ->count();


                $get_school_license_strength = SchoolLicence::where('school_name_id', Auth::user()->related_school_name_id)
                    ->where('related_class_name_id', $this->user->related_class_name_id)
                    ->where('related_test_type_id', $testId)
                    ->where('valid_from', '<=', $this->current_date)
                    ->where('valid_to', '>=', $this->current_date)
                    ->first();


                if ($get_school_license_strength == null || $testTypeCount >= $get_school_license_strength->student_count) {
                        $exceededTesttype[] = $testId; // Add the Test Type to the list of exceeded list
                }

            }

            if (!empty($exceededTesttype)) {

                $errorMessage = "License Strength Exceeded for the following abilities: ";
                foreach ($exceededTesttype as $abilityId) {

                    $abilityName = Test::find($abilityId)->test_name; // Assuming you have a model called Ability
                    $errorMessage .= "$abilityName, ";
                }
                $errorMessage = rtrim($errorMessage, ', '); // Remove the trailing comma

               session()->flash('error', $errorMessage . ". Please contact your school admin.");

                return redirect()->route('admin.studentlist');
            }
        }

       // $this->validate();

        if ($this->logged_in_user_role == 'Admin')
            $this->user->password = $this->password;

        $this->user->save();
        $this->user->relatedTestType()->sync($this->related_test_type);
        $this->user->roles()->sync($this->roles);
        if ($this->logged_in_user_role == 'Admin')
        return redirect()->route('admin.users.index');
        else
        return redirect()->route('admin.studentlist');
    }

    protected function rules(): array
    {
        return [
            'user.related_school_name_id' => [
                'integer',
                'exists:schools,id',
                'nullable',
            ],
            'user.name' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email',
            ],
            'password' => [
                'string',
                'required',
            ],
            'user.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'related_test_type' => [
                'array',
            ],
            'related_test_type.*.id' => [
                'integer',
                'exists:tests,id',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.locale' => [
                'string',
                'nullable',
            ],
            'user.phone_no' => [
                'string',
                'nullable',
            ],
            'user.age' => [
                'string',
                'nullable',
            ],
            'user.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'user.occupation' => [
                'string',
                'nullable',
            ],
            'user.address' => [
                'string',
                'nullable',
            ],
            'user.date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'user.disability_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['disability_status'])),
            ],
            'user.qualification_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['qualification_status'])),
            ],
            'user.stream_group_id' => [
                'integer',
                'exists:stream_groups,id',
                'nullable',
            ],
            'user.stream_id' => [
                'integer',
                'exists:stream_masters,id',
                'nullable',
            ],
            'user.percent_10' => [
                'string',
                'nullable',
            ],
            'user.percent_11' => [
                'string',
                'nullable',
            ],
            'user.percent_12' => [
                'string',
                'nullable',
            ],
            'user.percent_graduation' => [
                'string',
                'nullable',
            ],
            'user.is_approved' => [
                'boolean',
            ],
            'user.marks_type_8' => [
                'string',
                'nullable',
            ],
            'user.marks_type_9' => [
                'string',
                'nullable',
            ],
            'user.marks_type_10' => [
                'string',
                'nullable',
            ],
            'user.marks_type_11' => [
                'string',
                'nullable',
            ],
            'user.marks_english_8' => [
                'string',
                'nullable',
            ],
            'user.marks_english_9' => [
                'string',
                'nullable',
            ],
            'user.marks_english_10' => [
                'string',
                'nullable',
            ],
            'user.marks_english_11' => [
                'string',
                'nullable',
            ],
            'user.marks_math_8' => [
                'string',
                'nullable',
            ],
            'user.marks_math_9' => [
                'string',
                'nullable',
            ],
            'user.marks_math_10' => [
                'string',
                'nullable',
            ],
            'user.marks_math_11' => [
                'string',
                'nullable',
            ],

            'user.marks_science_8' => [
                'string',
                'nullable',
            ],
            'user.marks_science_9' => [
                'string',
                'nullable',
            ],
            'user.marks_science_10' => [
                'string',
                'nullable',
            ],
            'user.marks_science_11' => [
                'string',
                'nullable',
            ],
            'user.marks_aggregate_8' => [
                'string',
                'nullable',
            ],
            'user.marks_aggregate_9' => [
                'string',
                'nullable',
            ],
            'user.marks_aggregate_10' => [
                'string',
                'nullable',
            ],
            'user.marks_aggregate_11' => [
                'string',
                'nullable',
            ],
            'user.aspired_career_1' => [
                'string',
                'nullable',
            ],
            'user.aspired_career_2' => [
                'string',
                'nullable',
            ],

        ];
    }
}
