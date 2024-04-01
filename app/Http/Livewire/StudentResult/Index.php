<?php

namespace App\Http\Livewire\StudentResult;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\StudentResult;
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
        $this->orderable         = (new StudentResult())->orderable;
    }

    public function render()
    {
        $query = StudentResult::with(['relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $studentResults = $query->paginate($this->perPage);

        return view('livewire.student-result.index', compact('query', 'studentResults'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('student_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        StudentResult::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(StudentResult $studentResult)
    {
        abort_if(Gate::denies('student_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentResult->delete();
    }
}
