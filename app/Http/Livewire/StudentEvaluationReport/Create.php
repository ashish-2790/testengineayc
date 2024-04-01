<?php

namespace App\Http\Livewire\StudentEvaluationReport;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\CollegeMaster;
use App\Models\CreateTest;
use App\Models\ObservationTemplate;
use App\Models\ProfessionMaster;
use App\Models\StreamMaster;
use App\Models\StudentEvaluationReport;
use App\Models\Test;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public array $related_stream = [];

    public array $related_college = [];

    public array $related_profession = [];

    public StudentEvaluationReport $studentEvaluationReport;

    public function mount(StudentEvaluationReport $studentEvaluationReport)
    {
        $this->studentEvaluationReport           = $studentEvaluationReport;
        $this->studentEvaluationReport->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.student-evaluation-report.create');
    }

    public function submit()
    {
        $this->validate();

        $this->studentEvaluationReport->save();
        $this->studentEvaluationReport->relatedCollege()->sync($this->related_college);
        $this->studentEvaluationReport->relatedStream()->sync($this->related_stream);
        $this->studentEvaluationReport->relatedProfession()->sync($this->related_profession);

        return redirect()->route('admin.student-evaluation-reports.index');
    }

    protected function rules(): array
    {
        return [
            'studentEvaluationReport.related_student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'studentEvaluationReport.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'studentEvaluationReport.related_test_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'studentEvaluationReport.related_ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'studentEvaluationReport.create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'studentEvaluationReport.related_observation_template_id' => [
                'integer',
                'exists:observation_templates,id',
                'nullable',
            ],
            'studentEvaluationReport.sten_score' => [
                'string',
                'nullable',
            ],
            'studentEvaluationReport.observation_1' => [
                'string',
                'nullable',
            ],
            'studentEvaluationReport.observation_2' => [
                'string',
                'nullable',
            ],
            'studentEvaluationReport.observation_3' => [
                'string',
                'nullable',
            ],
            'studentEvaluationReport.observation_4' => [
                'string',
                'nullable',
            ],
            'studentEvaluationReport.observation_5' => [
                'string',
                'nullable',
            ],
            'studentEvaluationReport.observation_6' => [
                'string',
                'nullable',
            ],
            'related_college' => [
                'array',
            ],
            'related_college.*.id' => [
                'integer',
                'exists:college_masters,id',
            ],
            'related_stream' => [
                'array',
            ],
            'related_stream.*.id' => [
                'integer',
                'exists:stream_masters,id',
            ],
            'related_profession' => [
                'array',
            ],
            'related_profession.*.id' => [
                'integer',
                'exists:profession_masters,id',
            ],
            'studentEvaluationReport.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_student']              = User::pluck('name', 'id')->toArray();
        $this->listsForFields['related_class_name']           = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test']                 = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability']              = AbilityMaster::pluck('ability_name', 'id')->toArray();
        $this->listsForFields['create_test']                  = CreateTest::pluck('max_student_join', 'id')->toArray();
        $this->listsForFields['related_observation_template'] = ObservationTemplate::pluck('sten_score_from', 'id')->toArray();
        $this->listsForFields['related_college']              = CollegeMaster::pluck('college_name', 'id')->toArray();
        $this->listsForFields['related_stream']               = StreamMaster::pluck('stream_name', 'id')->toArray();
        $this->listsForFields['related_profession']           = ProfessionMaster::pluck('profession_name', 'id')->toArray();
    }
}
