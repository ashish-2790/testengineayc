<?php

namespace App\Http\Livewire\Test;

use App\Models\ClassMaster;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public Test $test;

    public array $class_name = [];

    public array $listsForFields = [];

    public function mount(Test $test)
    {
        $this->test           = $test;
        $this->test->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.test.create');
    }

    public function submit()
    {
        $this->validate();

        $this->test->save();
        $this->test->className()->sync($this->class_name);

        return redirect()->route('admin.tests.index');
    }

    protected function rules(): array
    {
        return [
            'class_name' => [
                'array',
            ],
            'class_name.*.id' => [
                'integer',
                'exists:class_masters,id',
            ],
            'test.test_name' => [
                'string',
                'nullable',
            ],
            'test.order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'test.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['class_name'] = ClassMaster::pluck('class_name', 'id')->toArray();
    }
}
