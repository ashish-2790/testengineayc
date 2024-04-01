<?php

namespace App\Http\Livewire\OverallObservationTemplate;

use App\Models\ClassMaster;
use App\Models\CollegeMaster;
use App\Models\CourseMaster;
use App\Models\OverallObservationTemplate;
use App\Models\ProfessionMaster;
use App\Models\StreamGroup;
use App\Models\StreamMaster;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public array $class = [];

    public array $stream = [];

    public array $course = [];

    public array $college = [];

    public array $profession = [];

    public array $stream_group = [];

    public array $listsForFields = [];

    public $detailed_observation_1 ;
    public $detailed_observation_2 ;
    public $detailed_observation_3 ;
    public $detailed_observation_4 ;
    public $detailed_observation_5 ;
    public $detailed_observation_6 ;

    public OverallObservationTemplate $overallObservationTemplate;

    public function mount(OverallObservationTemplate $overallObservationTemplate)
    {
        $this->overallObservationTemplate = $overallObservationTemplate;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.overall-observation-template.create');
    }

    public function submit()
    {
        $this->validate();

        $this->overallObservationTemplate->detailed_observation_1 = $this->detailed_observation_1;
        $this->overallObservationTemplate->detailed_observation_2 = $this->detailed_observation_2;
        $this->overallObservationTemplate->detailed_observation_3 = $this->detailed_observation_3;
        $this->overallObservationTemplate->detailed_observation_4 = $this->detailed_observation_4;
        $this->overallObservationTemplate->detailed_observation_5 = $this->detailed_observation_5;
        $this->overallObservationTemplate->detailed_observation_6 = $this->detailed_observation_6;

        $this->overallObservationTemplate->save();
        $this->overallObservationTemplate->class()->sync($this->class);
        $this->overallObservationTemplate->streamGroup()->sync($this->stream_group);
        $this->overallObservationTemplate->stream()->sync($this->stream);
        $this->overallObservationTemplate->course()->sync($this->course);
        $this->overallObservationTemplate->college()->sync($this->college);
        $this->overallObservationTemplate->profession()->sync($this->profession);

        return redirect()->route('admin.overall-observation-templates.index');
    }

    protected function rules(): array
    {
        return [
            'class' => [
                'array',
            ],
            'class.*.id' => [
                'integer',
                'exists:class_masters,id',
            ],
            'overallObservationTemplate.test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'overallObservationTemplate.overall_stenscore_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.overall_stenscore_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.short_description' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.detailed_observation_1' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.detailed_observation_2' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.detailed_observation_3' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.detailed_observation_4' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.detailed_observation_5' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.detailed_observation_6' => [
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
            'stream' => [
                'array',
            ],
            'stream.*.id' => [
                'integer',
                'exists:stream_masters,id',
            ],
            'course' => [
                'array',
            ],
            'course.*.id' => [
                'integer',
                'exists:course_masters,id',
            ],
            'college' => [
                'array',
            ],
            'college.*.id' => [
                'integer',
                'exists:college_masters,id',
            ],
            'profession' => [
                'array',
            ],
            'profession.*.id' => [
                'integer',
                'exists:profession_masters,id',
            ],
            'overallObservationTemplate.ability_1_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_1_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_2_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_2_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_3_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_3_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_4_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_4_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_5_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_5_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_6_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_6_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_7_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_7_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_8_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_8_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_9_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_9_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_10_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_10_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_11_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_11_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_12_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_12_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_13_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_13_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_14_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_14_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_15_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_15_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_16_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_16_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_17_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_17_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_18_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_18_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_19_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_19_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_20_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_20_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_21_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_21_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_22_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_22_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_23_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_23_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_24_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_24_to' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_25_from' => [
                'string',
                'nullable',
            ],
            'overallObservationTemplate.ability_25_to' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['class']        = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['test_type']    = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['stream_group'] = StreamGroup::pluck('stream_group_master', 'id')->toArray();
        $this->listsForFields['stream']       = StreamMaster::pluck('stream_name', 'id')->toArray();
        $this->listsForFields['course']       = CourseMaster::pluck('course_name', 'id')->toArray();
        $this->listsForFields['college']      = CollegeMaster::pluck('college_name', 'id')->toArray();
        $this->listsForFields['profession']   = ProfessionMaster::pluck('profession_name', 'id')->toArray();
    }
}
