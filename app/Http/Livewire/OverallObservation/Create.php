<?php

namespace App\Http\Livewire\OverallObservation;

use App\Models\CollegeMaster;
use App\Models\CourseMaster;
use App\Models\OverallObservation;
use App\Models\OverallResultReport;
use App\Models\ProfessionMaster;
use App\Models\StreamGroup;
use App\Models\StreamMaster;
use App\Models\StudentTestTaken;
use Livewire\Component;

class Create extends Component
{
    public array $stream = [];

    public array $college = [];

    public array $courses = [];

    public array $profession = [];

    public array $stream_group = [];

    public array $listsForFields = [];

    public $observation_1;
    public $observation_2;
    public $observation_3;
    public $observation_4;
    public $observation_5;
    public $observation_6;

    public OverallObservation $overallObservation;

    public function mount(OverallObservation $overallObservation)
    {
        $this->overallObservation = $overallObservation;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.overall-observation.create');
    }

    public function submit()
    {
        $this->validate();

        $this->overallObservation->observation_1 = $this->observation_1;
        $this->overallObservation->observation_2 = $this->observation_2;
        $this->overallObservation->observation_3 = $this->observation_3;
        $this->overallObservation->observation_4 = $this->observation_4;
        $this->overallObservation->observation_5 = $this->observation_5;
        $this->overallObservation->observation_6 = $this->observation_6;


        $this->overallObservation->save();
        $this->overallObservation->streamGroup()->sync($this->stream_group);
        $this->overallObservation->stream()->sync($this->stream);
        $this->overallObservation->college()->sync($this->college);
        $this->overallObservation->courses()->sync($this->courses);
        $this->overallObservation->profession()->sync($this->profession);

        return redirect()->route('admin.overall-observations.index');
    }

    protected function rules(): array
    {
        return [
            'overallObservation.student_test_taken_id' => [
                'integer',
                'exists:student_test_takens,id',
                'nullable',
            ],
            'overallObservation.overall_result_id' => [
                'integer',
                'exists:overall_result_reports,id',
                'nullable',
            ],
            'overallObservation.overall_sten_score' => [
                'string',
                'nullable',
            ],
            'overallObservation.short_description' => [
                'string',
                'nullable',
            ],
            'overallObservation.observation_1' => [
                'string',
                'nullable',
            ],
            'overallObservation.observation_2' => [
                'string',
                'nullable',
            ],
            'overallObservation.observation_3' => [
                'string',
                'nullable',
            ],
            'overallObservation.observation_4' => [
                'string',
                'nullable',
            ],
            'overallObservation.observation_5' => [
                'string',
                'nullable',
            ],
            'overallObservation.observation_6' => [
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
            'college' => [
                'array',
            ],
            'college.*.id' => [
                'integer',
                'exists:college_masters,id',
            ],
            'courses' => [
                'array',
            ],
            'courses.*.id' => [
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
        $this->listsForFields['student_test_taken'] = StudentTestTaken::pluck('stage', 'id')->toArray();
        $this->listsForFields['overall_result']     = OverallResultReport::pluck('overall_raw_score', 'id')->toArray();
        $this->listsForFields['stream_group']       = StreamGroup::pluck('stream_group_master', 'id')->toArray();
        $this->listsForFields['stream']             = StreamMaster::pluck('stream_name', 'id')->toArray();
        $this->listsForFields['college']            = CollegeMaster::pluck('college_name', 'id')->toArray();
        $this->listsForFields['courses']            = CourseMaster::pluck('course_name', 'id')->toArray();
        $this->listsForFields['profession']         = ProfessionMaster::pluck('profession_name', 'id')->toArray();
    }
}
