<?php

namespace App\Http\Livewire\CreateTest;

use App\Models\ClassMaster;
use App\Models\CreateTest;
use App\Models\QuestionPaper;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public CreateTest $createTest;
    public $instruction;
    public $enable_duration = 0;

    public array $listsForFields = [];

    public function mount(CreateTest $createTest)
    {
        $this->createTest           = $createTest;
        $this->createTest->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.create-test.create');
    }

    public function submit()
    {
        $this->validate();

        $this->createTest->instruction = $this->instruction;

        $this->createTest->save();

        return redirect()->route('admin.create-tests.index');
    }

    public function updatedEnableDuration($value)
    {
        if ($value == 1) {
            $this->enable_duration = 1;

        } else {
            $this->enable_duration = 0;
        }
    }

    protected function rules(): array
    {
        return [
            'createTest.instruction' => [
                'string',
                'nullable',
            ],
            'createTest.video_url' => [
                'string',
                'nullable',
            ],
            'createTest.udf_1' => [
                'string',
                'nullable',
            ],
            'createTest.related_question_paper_id' => [
                'integer',
                'exists:question_papers,id',
                'nullable',
            ],
            'createTest.valid_from' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'createTest.valid_to' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'createTest.related_class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'createTest.related_test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'createTest.max_student_join' => [
                'string',
                'nullable',
            ],
            'createTest.maximum_score' => [
                'string',
                'nullable',
            ],
            'createTest.minimum_score' => [
                'string',
                'nullable',
            ],
            'createTest.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_question_paper'] = QuestionPaper::pluck('question_paper_name', 'id')->toArray();
        $this->listsForFields['related_class']          = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_type']      = Test::pluck('test_name', 'id')->toArray();
    }
}
