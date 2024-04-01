<?php

namespace App\Http\Livewire\StudentTestAnswer;

use App\Models\CreateTest;
use App\Models\QuestionBank;
use App\Models\StudentTestAnswer;
use App\Models\StudentTestTaken;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public StudentTestAnswer $studentTestAnswer;

    public function mount(StudentTestAnswer $studentTestAnswer)
    {
        $this->studentTestAnswer           = $studentTestAnswer;
        $this->studentTestAnswer->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.student-test-answer.create');
    }

    public function submit()
    {
        $this->validate();

        $this->studentTestAnswer->save();

        return redirect()->route('admin.student-test-answers.index');
    }

    protected function rules(): array
    {
        return [
            'studentTestAnswer.related_student_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'studentTestAnswer.related_student_test_taken_id' => [
                'integer',
                'exists:student_test_takens,id',
                'nullable',
            ],
            'studentTestAnswer.related_question_bank_id' => [
                'integer',
                'exists:question_banks,id',
                'nullable',
            ],
            'studentTestAnswer.create_test_id' => [
                'integer',
                'exists:create_tests,id',
                'nullable',
            ],
            'studentTestAnswer.answer_choice' => [
                'string',
                'nullable',
            ],
            'studentTestAnswer.score' => [
                'string',
                'nullable',
            ],
            'studentTestAnswer.answer_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['answer_status'])),
            ],
            'studentTestAnswer.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_student']            = User::pluck('name', 'id')->toArray();
        $this->listsForFields['related_student_test_taken'] = StudentTestTaken::pluck('started_at', 'id')->toArray();
        $this->listsForFields['related_question_bank']      = QuestionBank::pluck('question_text', 'id')->toArray();
        $this->listsForFields['create_test']                = CreateTest::pluck('max_student_join', 'id')->toArray();
        $this->listsForFields['answer_status']              = $this->studentTestAnswer::ANSWER_STATUS_SELECT;
    }
}
