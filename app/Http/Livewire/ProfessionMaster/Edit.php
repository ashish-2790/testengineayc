<?php

namespace App\Http\Livewire\ProfessionMaster;

use App\Models\ProfessionMaster;
use Livewire\Component;

class Edit extends Component
{
    public ProfessionMaster $professionMaster;

    public function mount(ProfessionMaster $professionMaster)
    {
        $this->professionMaster = $professionMaster;
    }

    public function render()
    {
        return view('livewire.profession-master.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->professionMaster->save();

        return redirect()->route('admin.profession-masters.index');
    }

    protected function rules(): array
    {
        return [
            'professionMaster.profession_name' => [
                'string',
                'nullable',
            ],
            'professionMaster.inactive' => [
                'boolean',
            ],
        ];
    }
}
