<?php

namespace App\Http\Livewire\OverallReportTemplate;

use App\Models\ClassMaster;
use App\Models\OverallReportTemplate;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public $detailed_report_1;
    public $detailed_report_2;
    public $detailed_report_3;
    public $detailed_report_4;
    public $detailed_report_5;
    public $detailed_report_6;

    public array $class = [];

    public array $listsForFields = [];

    public OverallReportTemplate $overallReportTemplate;

    public function mount(OverallReportTemplate $overallReportTemplate)
    {
        $this->overallReportTemplate = $overallReportTemplate;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.overall-report-template.create');
    }

    public function submit()
    {
        $this->validate();

        $this->overallReportTemplate->detailed_report_1 = $this->detailed_report_1;
        $this->overallReportTemplate->detailed_report_2 = $this->detailed_report_2;
        $this->overallReportTemplate->detailed_report_3 = $this->detailed_report_3;
        $this->overallReportTemplate->detailed_report_4 = $this->detailed_report_4;
        $this->overallReportTemplate->detailed_report_5 = $this->detailed_report_5;
        $this->overallReportTemplate->detailed_report_6 = $this->detailed_report_6;

        $this->overallReportTemplate->save();
        $this->overallReportTemplate->class()->sync($this->class);

        return redirect()->route('admin.overall-report-templates.index');
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
            'overallReportTemplate.test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'overallReportTemplate.overall_stenscore_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.overall_stenscore_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.short_review' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.detailed_report_1' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.detailed_report_2' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.detailed_report_3' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.detailed_report_4' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.detailed_report_5' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.detailed_report_6' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_1_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_1_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_2_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_2_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_3_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_3_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_4_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_4_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_5_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_5_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_6_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_6_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_7_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_7_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_8_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_8_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_9_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_9_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_10_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_10_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_11_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_11_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_12_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_12_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_13_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_13_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_14_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_14_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_15_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_15_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_16_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_16_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_17_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_17_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_18_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_18_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_19_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_19_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_20_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_20_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_21_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_21_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_22_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_22_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_23_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_23_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_24_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_24_to' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_25_from' => [
                'string',
                'nullable',
            ],
            'overallReportTemplate.ability_25_to' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['class']     = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['test_type'] = Test::pluck('test_name', 'id')->toArray();
    }
}
