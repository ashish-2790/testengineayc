<?php

namespace App\Http\Livewire\ClassMaster;

use App\Models\ClassMaster;
use Livewire\Component;

class Edit extends Component
{
    public ClassMaster $classMaster;

    public function mount(ClassMaster $classMaster)
    {
        $this->classMaster = $classMaster;
    }

    public function render()
    {
        return view('livewire.class-master.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->classMaster->save();

        return redirect()->route('admin.class-masters.index');
    }

    protected function rules(): array
    {
        return [
            'classMaster.class_name' => [
                'string',
                'nullable',
            ],
            'classMaster.inactive' => [
                'boolean',
            ],
        ];
    }
}
