<?php

namespace App\Http\Livewire\ReportTemplate;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\ReportTemplate;
use App\Models\Test;
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


    public ReportTemplate $reportTemplate;

    public function mount(ReportTemplate $reportTemplate)
    {
        $this->reportTemplate = $reportTemplate;

        $this->report_1 = $reportTemplate->report_1;
        $this->report_2 = $reportTemplate->report_2;
        $this->report_3 = $reportTemplate->report_3;
        $this->report_4 = $reportTemplate->report_4;
        $this->report_5 = $reportTemplate->report_5;
        $this->report_6 = $reportTemplate->report_6;


        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.report-template.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->reportTemplate->report_1 = $this->report_1;
        $this->reportTemplate->report_2 = $this->report_2;
        $this->reportTemplate->report_3 = $this->report_3;
        $this->reportTemplate->report_4 = $this->report_4;
        $this->reportTemplate->report_5 = $this->report_5;
        $this->reportTemplate->report_6 = $this->report_6;


        $this->reportTemplate->save();

        return redirect()->route('admin.report-templates.index');
    }

    protected function rules(): array
    {
        return [
            'reportTemplate.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'reportTemplate.related_test_name_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'reportTemplate.related_ability_name_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'reportTemplate.test_sten_score_from' => [
                'string',
                'nullable',
            ],
            'reportTemplate.test_sten_score_to' => [
                'string',
                'nullable',
            ],
            'reportTemplate.short_review' => [
                'string',
                'nullable',
            ],
            'reportTemplate.report_1' => [
                'string',
                'nullable',
            ],
            'reportTemplate.report_2' => [
                'string',
                'nullable',
            ],
            'reportTemplate.report_3' => [
                'string',
                'nullable',
            ],
            'reportTemplate.report_4' => [
                'string',
                'nullable',
            ],
            'reportTemplate.report_5' => [
                'string',
                'nullable',
            ],
            'reportTemplate.report_6' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_class_name']   = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_name']    = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability_name'] = AbilityMaster::pluck('ability_name', 'id')->toArray();
    }
}
