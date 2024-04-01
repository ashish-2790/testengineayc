<?php

namespace App\Http\Livewire\OverallResultReport;

use App\Models\OverallResultReport;
use App\Models\StudentTestTaken;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public $report_1;
    public $report_2;
    public $report_3;
    public $report_4;
    public $report_5;
    public $report_6;

    public OverallResultReport $overallResultReport;

    public function mount(OverallResultReport $overallResultReport)
    {
        $this->overallResultReport = $overallResultReport;
        $this->report_1 = $overallResultReport->report_1;
        $this->report_2 = $overallResultReport->report_2;
        $this->report_3 = $overallResultReport->report_3;
        $this->report_4 = $overallResultReport->report_4;
        $this->report_5 = $overallResultReport->report_5;
        $this->report_6 = $overallResultReport->report_6;

        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.overall-result-report.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->overallResultReport->report_1 = $this->report_1;
        $this->overallResultReport->report_2 = $this->report_2;
        $this->overallResultReport->report_3 = $this->report_3;
        $this->overallResultReport->report_4 = $this->report_4;
        $this->overallResultReport->report_5 = $this->report_5;
        $this->overallResultReport->report_6 = $this->report_6;

        $this->overallResultReport->save();

        return redirect()->route('admin.overall-result-reports.index');
    }

    protected function rules(): array
    {
        return [
            'overallResultReport.student_test_taken_id' => [
                'integer',
                'exists:student_test_takens,id',
                'nullable',
            ],
            'overallResultReport.overall_raw_score' => [
                'string',
                'nullable',
            ],
            'overallResultReport.overall_sten_score' => [
                'string',
                'nullable',
            ],
            'overallResultReport.short_description' => [
                'string',
                'nullable',
            ],
            'overallResultReport.report_1' => [
                'string',
                'nullable',
            ],
            'overallResultReport.report_2' => [
                'string',
                'nullable',
            ],
            'overallResultReport.report_3' => [
                'string',
                'nullable',
            ],
            'overallResultReport.report_4' => [
                'string',
                'nullable',
            ],
            'overallResultReport.report_5' => [
                'string',
                'nullable',
            ],
            'overallResultReport.report_6' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['student_test_taken'] = StudentTestTaken::pluck('stage', 'id')->toArray();
    }
}
