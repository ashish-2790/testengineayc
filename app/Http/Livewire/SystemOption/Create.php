<?php

namespace App\Http\Livewire\SystemOption;

use App\Models\SystemOption;
use Livewire\Component;

class Create extends Component
{
    public SystemOption $systemOption;

    public function mount(SystemOption $systemOption)
    {
        $this->systemOption           = $systemOption;
        $this->systemOption->inactive = false;
    }

    public function render()
    {
        return view('livewire.system-option.create');
    }

    public function submit()
    {
        $this->validate();

        $this->systemOption->save();

        return redirect()->route('admin.system-options.index');
    }

    protected function rules(): array
    {
        return [
            'systemOption.option_name' => [
                'string',
                'nullable',
            ],
            'systemOption.option_value' => [
                'string',
                'nullable',
            ],
            'systemOption.inactive' => [
                'boolean',
            ],
        ];
    }
}
