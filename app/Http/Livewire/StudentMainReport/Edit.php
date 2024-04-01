<?php

namespace App\Http\Livewire\StudentMainReport;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\CreateTest;
use App\Models\ReportTemplate;
use App\Models\StudentMainReport;
use App\Models\Test;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public StudentMainReport $studentMainReport;

    public function mount(StudentMainReport $studentMainReport)
    {
        $this->studentMainReport = $studentMainReport;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.student-main-report.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->studentMainReport->save();

        return redirect()->route('admin.student-main-reports.index');
    }

    protected function rules(): array
    {
        return [
            'studentMainReport.related_student_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'studentMainReport.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'studentMainReport.related_test_name_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'studentMainReport.related_ability_name_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'studentMainReport.create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'studentMainReport.related_report_template_id' => [
                'integer',
                'exists:report_templates,id',
                'nullable',
            ],
            'studentMainReport.sten_score' => [
                'string',
                'nullable',
            ],
            'studentMainReport.report_1' => [
                'string',
                'nullable',
            ],
            'studentMainReport.report_2' => [
                'string',
                'nullable',
            ],
            'studentMainReport.report_3' => [
                'string',
                'nullable',
            ],
            'studentMainReport.report_4' => [
                'string',
                'nullable',
            ],
            'studentMainReport.report_5' => [
                'string',
                'nullable',
            ],
            'studentMainReport.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_student_name']    = User::pluck('name', 'id')->toArray();
        $this->listsForFields['related_class_name']      = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_name']       = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability_name']    = AbilityMaster::pluck('ability_name', 'id')->toArray();
        $this->listsForFields['create_test']             = CreateTest::pluck('max_student_join', 'id')->toArray();
        $this->listsForFields['related_report_template'] = ReportTemplate::pluck('test_sten_score_from', 'id')->toArray();
    }
}
