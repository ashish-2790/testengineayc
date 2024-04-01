<?php

namespace App\Http\Livewire\OverallStudentReport;

use App\Models\ClassMaster;
use App\Models\OverallStudentReport;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public OverallStudentReport $overallStudentReport;

    public function mount(OverallStudentReport $overallStudentReport)
    {
        $this->overallStudentReport = $overallStudentReport;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.overall-student-report.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->overallStudentReport->save();

        return redirect()->route('admin.overall-student-reports.index');
    }

    protected function rules(): array
    {
        return [
            'overallStudentReport.class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'overallStudentReport.student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'overallStudentReport.overall_sten_score' => [
                'string',
                'nullable',
            ],
            'overallStudentReport.short_description' => [
                'string',
                'nullable',
            ],
            'overallStudentReport.detailed_report_1' => [
                'string',
                'nullable',
            ],
            'overallStudentReport.detailed_report_2' => [
                'string',
                'nullable',
            ],
            'overallStudentReport.detailed_report_3' => [
                'string',
                'nullable',
            ],
            'overallStudentReport.detailed_report_4' => [
                'string',
                'nullable',
            ],
            'overallStudentReport.detailed_report_5' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['class']   = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['student'] = User::pluck('name', 'id')->toArray();
    }
}
