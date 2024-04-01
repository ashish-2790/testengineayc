<?php

namespace App\Http\Livewire\AbilityMaster;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public $ability_instruction;

    public AbilityMaster $abilityMaster;

    public function mount(AbilityMaster $abilityMaster)
    {
        $this->abilityMaster = $abilityMaster;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.ability-master.create');
    }

    public function submit()
    {
        $this->validate();

        $this->abilityMaster->ability_instruction = $this->ability_instruction;

        $this->abilityMaster->save();

        return redirect()->route('admin.ability-masters.index');
    }

    protected function rules(): array
    {
        return [
            'abilityMaster.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'abilityMaster.related_test_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'abilityMaster.ability_name' => [
                'string',
                'nullable',
            ],
            'abilityMaster.ability_instruction' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_class_name'] = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test']       = Test::pluck('test_name', 'id')->toArray();
    }
}
