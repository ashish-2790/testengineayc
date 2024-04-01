<?php

namespace App\Http\Livewire\ObservationTemplate;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\CollegeMaster;
use App\Models\CourseMaster;
use App\Models\ObservationTemplate;
use App\Models\ProfessionMaster;
use App\Models\StreamGroup;
use App\Models\StreamMaster;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public array $stream = [];

    public array $course = [];

    public array $college = [];

    public array $profession = [];

    public array $stream_group = [];

    public array $listsForFields = [];

    public $observation_1;
    public $observation_2;
    public $observation_3;
    public $observation_4;
    public $observation_5;
    public $observation_6;


    public ObservationTemplate $observationTemplate;

    public function mount(ObservationTemplate $observationTemplate)
    {
        $this->observationTemplate           = $observationTemplate;
        $this->observationTemplate->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.observation-template.create');
    }

    public function submit()
    {
        $this->validate();

        $this->observationTemplate->observation_1 = $this->observation_1;
        $this->observationTemplate->observation_2 = $this->observation_2;
        $this->observationTemplate->observation_3 = $this->observation_3;
        $this->observationTemplate->observation_4 = $this->observation_4;
        $this->observationTemplate->observation_5 = $this->observation_5;
        $this->observationTemplate->observation_6 = $this->observation_6;

        $this->observationTemplate->save();
        $this->observationTemplate->streamGroup()->sync($this->stream_group);
        $this->observationTemplate->stream()->sync($this->stream);
        $this->observationTemplate->course()->sync($this->course);
        $this->observationTemplate->college()->sync($this->college);
        $this->observationTemplate->profession()->sync($this->profession);

        return redirect()->route('admin.observation-templates.index');
    }

    protected function rules(): array
    {
        return [
            'observationTemplate.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'observationTemplate.related_test_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'observationTemplate.related_ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'observationTemplate.sten_score_from' => [
                'string',
                'nullable',
            ],
            'observationTemplate.sten_score_to' => [
                'string',
                'nullable',
            ],
            'observationTemplate.observation_1' => [
                'string',
                'nullable',
            ],
            'observationTemplate.observation_2' => [
                'string',
                'nullable',
            ],
            'observationTemplate.observation_3' => [
                'string',
                'nullable',
            ],
            'observationTemplate.observation_4' => [
                'string',
                'nullable',
            ],
            'observationTemplate.observation_5' => [
                'string',
                'nullable',
            ],
            'observationTemplate.observation_6' => [
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
            'observationTemplate.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_class_name'] = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test']       = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability']    = AbilityMaster::pluck('ability_name', 'id')->toArray();
        $this->listsForFields['stream_group']       = StreamGroup::pluck('stream_group_master', 'id')->toArray();
        $this->listsForFields['stream']             = StreamMaster::pluck('stream_name', 'id')->toArray();
        $this->listsForFields['course']             = CourseMaster::pluck('course_name', 'id')->toArray();
        $this->listsForFields['college']            = CollegeMaster::pluck('college_name', 'id')->toArray();
        $this->listsForFields['profession']         = ProfessionMaster::pluck('profession_name', 'id')->toArray();
    }
}
