<?php

namespace App\Http\Livewire\QuestionPaper;

use App\Models\AbilityMaster;
use App\Models\ClassMaster;
use App\Models\QuestionPaper;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public array $related_ability = [];

    public QuestionPaper $questionPaper;

    public function mount(QuestionPaper $questionPaper)
    {
        $this->questionPaper           = $questionPaper;
        $this->questionPaper->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.question-paper.create');
    }

    public function submit()
    {
        $this->validate();

        $this->questionPaper->save();
        $this->questionPaper->relatedAbility()->sync($this->related_ability);

        return redirect()->route('admin.question-papers.index');
    }

    protected function rules(): array
    {
        return [
            'questionPaper.related_class_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'questionPaper.related_test_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'related_ability' => [
                'array',
            ],
            'related_ability.*.id' => [
                'integer',
                'exists:ability_masters,id',
            ],
            'questionPaper.question_paper_name' => [
                'string',
                'nullable',
            ],
            'questionPaper.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_class']   = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test']    = Test::pluck('test_name', 'id')->toArray();
        $this->listsForFields['related_ability'] = AbilityMaster::pluck('ability_name', 'id')->toArray();
    }
}
