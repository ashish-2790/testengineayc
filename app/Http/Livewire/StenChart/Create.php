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
    public $class_list;
    public $ability_list;
    public $abilitylist = [];
    public array $relatedclass=[];

    public array $listsForFields = [];

    public function mount(StenChart $stenChart)
    {
        $this->stenChart           = $stenChart;
        $this->stenChart->inactive = false;
        $this->initListsForFields();
        $this->ability_list = AbilityMaster::get();
        $this->class_list = ClassMaster::get();
    }

    public function render()
    {
        return view('livewire.sten-chart.create');
    }

    public function submit()
    {
        $this->validate();

        foreach ($this->relatedclass as  $value) {
            foreach ($this->abilitylist as $abilityvalue) {
                $this->stenChart->related_class_id = $value;
                $this->stenChart->related_ability_name_id = $abilityvalue;
                $get_testtype = AbilityMaster::where('id', $abilityvalue)->first();
                $this->stenChart->related_test_name_id = $get_testtype->related_test_id;
                $created = StenChart::create([
                    'related_test_name_id' => $this->stenChart->related_test_name_id,
                    'related_ability_name_id' => $this->stenChart->related_ability_name_id,
                    'related_class_id' => $value,
                    'max_score_raw' => $this->stenChart->max_score_raw,
                    'score_raw_from' => $this->stenChart->score_raw_from,
                    'score_raw_to' => $this->stenChart->score_raw_to,
                    'sten_score' => $this->stenChart->sten_score,
                    'udf_1' => $this->stenChart->udf_1,
                    'inactive' => $this->stenChart->inactive,
                ]);
            }
        }

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
