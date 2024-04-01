<?php

namespace App\Http\Livewire\AbilityWiseResult;

use App\Models\AbilityMaster;
use App\Models\AbilityWiseResult;
use App\Models\OverallResultReport;
use App\Models\StudentTestTaken;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public $report_1;
    public $report_2;
    public $report_3;
    public $report_4;
    public $report_5;
    public $report_6;

    public AbilityWiseResult $abilityWiseResult;

    public function mount(AbilityWiseResult $abilityWiseResult)
    {
        $this->abilityWiseResult = $abilityWiseResult;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.ability-wise-result.create');
    }

    public function submit()
    {
        $this->validate();

        $this->abilityWiseResult->report_1 = $this->report_1;
        $this->abilityWiseResult->report_2 = $this->report_2;
        $this->abilityWiseResult->report_3 = $this->report_3;
        $this->abilityWiseResult->report_4 = $this->report_4;
        $this->abilityWiseResult->report_5 = $this->report_5;
        $this->abilityWiseResult->report_6 = $this->report_6;


        $this->abilityWiseResult->save();

        return redirect()->route('admin.ability-wise-results.index');
    }

    protected function rules(): array
    {
        return [
            'abilityWiseResult.student_test_taken_id' => [
                'integer',
                'exists:student_test_takens,id',
                'nullable',
            ],
            'abilityWiseResult.overall_result_id' => [
                'integer',
                'exists:overall_result_reports,id',
                'nullable',
            ],
            'abilityWiseResult.ability_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'abilityWiseResult.ability_raw_score' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.ability_sten_score' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.short_description' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.report_1' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.report_2' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.report_3' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.report_4' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.report_5' => [
                'string',
                'nullable',
            ],
            'abilityWiseResult.report_6' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['student_test_taken'] = StudentTestTaken::pluck('stage', 'id')->toArray();
        $this->listsForFields['overall_result']     = OverallResultReport::pluck('overall_sten_score', 'id')->toArray();
        $this->listsForFields['ability']            = AbilityMaster::pluck('ability_name', 'id')->toArray();
    }
}
