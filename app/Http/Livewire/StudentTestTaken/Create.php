<?php

namespace App\Http\Livewire\StudentTestTaken;

use App\Models\ClassMaster;
use App\Models\CreateTest;
use App\Models\StudentTestTaken;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public StudentTestTaken $studentTestTaken;

    public function mount(StudentTestTaken $studentTestTaken)
    {
        $this->studentTestTaken           = $studentTestTaken;
        $this->studentTestTaken->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.student-test-taken.create');
    }

    public function submit()
    {
        $this->validate();

        $this->studentTestTaken->save();

        return redirect()->route('admin.student-test-takens.index');
    }

    protected function rules(): array
    {
        return [
            'studentTestTaken.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'studentTestTaken.related_student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'studentTestTaken.related_create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'studentTestTaken.started_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'studentTestTaken.ended_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'studentTestTaken.stage' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['stage'])),
            ],
            'studentTestTaken.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_class_name']  = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_student']     = User::pluck('name', 'id')->toArray();
        $this->listsForFields['related_create_test'] = CreateTest::pluck('instruction', 'id')->toArray();
        $this->listsForFields['stage']               = $this->studentTestTaken::STAGE_SELECT;
    }
}
