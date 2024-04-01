<?php

namespace App\Http\Livewire\StenChart;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\StenChart;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public StenChart $stenChart;

    public array $listsForFields = [];

    public function mount(StenChart $stenChart)
    {
        $this->stenChart           = $stenChart;
        $this->stenChart->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.sten-chart.create');
    }

    public function submit()
    {
        $this->validate();

        $this->stenChart->save();

        return redirect()->route('admin.sten-charts.index');
    }

    protected function rules(): array
    {
        return [
            'stenChart.related_class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'stenChart.related_test_name_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'stenChart.udf_1' => [
                'integer',
                'nullable',
            ],

            'stenChart.related_ability_name_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'stenChart.max_score_raw' => [
                'string',
                'nullable',
            ],
            'stenChart.score_raw_from' => [
                'string',
                'nullable',
            ],
            'stenChart.score_raw_to' => [
                'string',
                'nullable',
            ],
            'stenChart.sten_score' => [
                'string',
                'nullable',
            ],
            'stenChart.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_class']        = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_name']    = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability_name'] = AbilityMaster::pluck('ability_name', 'id')->toArray();
    }
}
