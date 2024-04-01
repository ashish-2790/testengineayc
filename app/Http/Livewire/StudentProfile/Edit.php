<?php

namespace App\Http\Livewire\StudentProfile;

use App\Models\StreamGroup;
use App\Models\StreamMaster;
use App\Models\StudentProfile;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public StudentProfile $studentProfile;

    public function mount(StudentProfile $studentProfile)
    {
        $this->studentProfile = $studentProfile;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.student-profile.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->studentProfile->save();

        return redirect()->route('admin.student-profiles.index');
    }

    protected function rules(): array
    {
        return [
            'studentProfile.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'studentProfile.date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'studentProfile.disability' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['disability'])),
            ],
            'studentProfile.qualification_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['qualification_status'])),
            ],
            'studentProfile.stream_group_id' => [
                'integer',
                'exists:stream_groups,id',
                'nullable',
            ],
            'studentProfile.stream_id' => [
                'integer',
                'exists:stream_masters,id',
                'nullable',
            ],
            'studentProfile.percent_10' => [
                'string',
                'nullable',
            ],
            'studentProfile.percent_11' => [
                'string',
                'nullable',
            ],
            'studentProfile.percent_12' => [
                'string',
                'nullable',
            ],
            'studentProfile.percent_graduation' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']                 = User::pluck('name', 'id')->toArray();
        $this->listsForFields['disability']           = $this->studentProfile::DISABILITY_RADIO;
        $this->listsForFields['qualification_status'] = $this->studentProfile::QUALIFICATION_STATUS_RADIO;
        $this->listsForFields['stream_group']         = StreamGroup::pluck('stream_group_master', 'id')->toArray();
        $this->listsForFields['stream']               = StreamMaster::pluck('stream_name', 'id')->toArray();
    }
}
