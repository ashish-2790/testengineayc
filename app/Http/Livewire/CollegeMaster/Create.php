<?php

namespace App\Http\Livewire\CollegeMaster;

use App\Models\CollegeMaster;
use Livewire\Component;

class Create extends Component
{
    public CollegeMaster $collegeMaster;

    public function mount(CollegeMaster $collegeMaster)
    {
        $this->collegeMaster           = $collegeMaster;
        $this->collegeMaster->inactive = false;
    }

    public function render()
    {
        return view('livewire.college-master.create');
    }

    public function submit()
    {
        $this->validate();

        $this->collegeMaster->save();

        return redirect()->route('admin.college-masters.index');
    }

    protected function rules(): array
    {
        return [
            'collegeMaster.college_name' => [
                'string',
                'nullable',
            ],
            'collegeMaster.website_url' => [
                'string',
                'nullable',
            ],
            'collegeMaster.inactive' => [
                'boolean',
            ],
        ];
    }
}
