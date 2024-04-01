<?php

namespace App\Http\Livewire\StudentResult;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\CreateTest;
use App\Models\StudentResult;
use App\Models\Test;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public StudentResult $studentResult;

    public function mount(StudentResult $studentResult)
    {
        $this->studentResult           = $studentResult;
        $this->studentResult->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.student-result.create');
    }

    public function submit()
    {
        $this->validate();

        $this->studentResult->save();

        return redirect()->route('admin.student-results.index');
    }

    protected function rules(): array
    {
        return [
            'studentResult.related_student_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'studentResult.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'studentResult.related_test_name_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'studentResult.related_ability_name_id' => [
                'integer',
                'exists:ability_masters,id',
                'nullable',
            ],
            'studentResult.create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'studentResult.result_score_total' => [
                'string',
                'nullable',
            ],
            'studentResult.sten_score' => [
                'string',
                'nullable',
            ],
            'studentResult.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_student_name'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['related_class_name']   = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_name']    = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability_name'] = AbilityMaster::pluck('ability_name', 'id')->toArray();
        $this->listsForFields['create_test']          = CreateTest::pluck('max_student_join', 'id')->toArray();
    }
}
