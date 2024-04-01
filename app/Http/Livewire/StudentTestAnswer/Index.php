<?php

namespace App\Http\Livewire\StudentTestAnswer;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\StudentTestAnswer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new StudentTestAnswer())->orderable;
    }

    public function render()
    {
        $query = StudentTestAnswer::with(['relatedStudent', 'relatedStudentTestTaken', 'relatedQuestionBank', 'createTest'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $studentTestAnswers = $query->paginate($this->perPage);

        return view('livewire.student-test-answer.index', compact('query', 'studentTestAnswers'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('student_test_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        StudentTestAnswer::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(StudentTestAnswer $studentTestAnswer)
    {
        abort_if(Gate::denies('student_test_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentTestAnswer->delete();
    }
}
