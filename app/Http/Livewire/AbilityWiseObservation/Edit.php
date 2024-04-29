<?php

namespace App\Http\Livewire\AbilityWiseObservation;

use App\Models\AbilityMaster;
use App\Models\AbilityWiseObservation;
use App\Models\AbilityWiseResult;
use App\Models\CollegeMaster;
use App\Models\CourseMaster;
use App\Models\OverallObservation;
use App\Models\ProfessionMaster;
use App\Models\StreamGroup;
use App\Models\StreamMaster;
use App\Models\StudentTestTaken;
use Livewire\Component;

class Edit extends Component
{
    public array $course = [];

    public array $college = [];

    public array $profession = [];

    public array $stream_group = [];

    public array $stream_master = [];

    public array $listsForFields = [];

    public AbilityWiseObservation $abilityWiseObservation;

    public function mount(AbilityWiseObservation $abilityWiseObservation)
    {
        $this->abilityWiseObservation = $abilityWiseObservation;
        $this->stream_group           = $this->abilityWiseObservation->streamGroup()->pluck('id')->toArray();
        $this->stream_master          = $this->abilityWiseObservation->streamMaster()->pluck('id')->toArray();
        $this->college                = $this->abilityWiseObservation->college()->pluck('id')->toArray();
        $this->course                 = $this->abilityWiseObservation->course()->pluck('id')->toArray();
        $this->profession             = $this->abilityWiseObservation->profession()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.ability-wise-observation.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->abilityWiseObservation->save();
        $this->abilityWiseObservation->streamGroup()->sync($this->stream_group);
        $this->abilityWiseObservation->streamMaster()->sync($this->stream_master);
        $this->abilityWiseObservation->college()->sync($this->college);
        $this->abilityWiseObservation->course()->sync($this->course);
        $this->abilityWiseObservation->profession()->sync($this->profession);

        return redirect()->route('admin.ability-wise-observations.index');
    }

    protected function rules(): array
    {
        return [
            'abilityWiseObservation.student_test_taken_id' => [
                'integer',
                'exists:student_test_takens,id',
                'nullable',
            ],
            'abilityWiseObservation.overall_observation_id' => [
                'integer',
                'exists:overall_observations,id',
                'nullable',
            ],
            'abilityWiseObservation.ability_result_id' => [
                'integer',
                'exists:ability_wise_results,id',
                'nullable',
            ],
            'abilityWiseObservation.ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'abilityWiseObservation.short_description' => [
                'string',
                'nullable',
            ],
            'abilityWiseObservation.ability_sten_score' => [
                'string',
                'nullable',
            ],
            'abilityWiseObservation.observation_1' => [
                'string',
                'nullable',
            ],
            'abilityWiseObservation.observation_2' => [
                'string',
                'nullable',
            ],
            'abilityWiseObservation.observation_3' => [
                'string',
                'nullable',
            ],
            'abilityWiseObservation.observation_4' => [
                'string',
                'nullable',
            ],
            'abilityWiseObservation.observation_5' => [
                'string',
                'nullable',
            ],
            'abilityWiseObservation.observation_6' => [
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

    protected function initListsForFields(): void
    {
        $this->listsForFields['student_test_taken']  = StudentTestTaken::pluck('stage', 'id')->toArray();
        $this->listsForFields['overall_observation'] = OverallObservation::pluck('overall_sten_score', 'id')->toArray();
        $this->listsForFields['ability_result']      = AbilityWiseResult::pluck('ability_sten_score', 'id')->toArray();
        $this->listsForFields['ability']             = AbilityMaster::pluck('ability_name', 'id')->toArray();
        $this->listsForFields['stream_group']        = StreamGroup::pluck('stream_group_master', 'id')->toArray();
        $this->listsForFields['stream_master']       = StreamMaster::pluck('stream_name', 'id')->toArray();
        $this->listsForFields['college']             = CollegeMaster::pluck('college_name', 'id')->toArray();
        $this->listsForFields['course']              = CourseMaster::pluck('course_name', 'id')->toArray();
        $this->listsForFields['profession']          = ProfessionMaster::pluck('profession_name', 'id')->toArray();
    }
}
