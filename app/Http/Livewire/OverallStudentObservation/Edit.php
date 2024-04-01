<?php

namespace App\Http\Livewire\OverallStudentObservation;

use App\Models\ClassMaster;
use App\Models\OverallStudentObservation;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public OverallStudentObservation $overallStudentObservation;

    public function mount(OverallStudentObservation $overallStudentObservation)
    {
        $this->overallStudentObservation = $overallStudentObservation;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.overall-student-observation.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->overallStudentObservation->save();

        return redirect()->route('admin.overall-student-observations.index');
    }

    protected function rules(): array
    {
        return [
            'overallStudentObservation.class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'overallStudentObservation.student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'overallStudentObservation.short_description' => [
                'string',
                'nullable',
            ],
            'overallStudentObservation.detailed_observation_1' => [
                'string',
                'nullable',
            ],
            'overallStudentObservation.detailed_observation_2' => [
                'string',
                'nullable',
            ],
            'overallStudentObservation.detailed_observation_3' => [
                'string',
                'nullable',
            ],
            'overallStudentObservation.detailed_observation_4' => [
                'string',
                'nullable',
            ],
            'overallStudentObservation.detailed_observation_5' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['class']   = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['student'] = User::pluck('phone_no', 'id')->toArray();
    }
}
