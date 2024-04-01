<?php

namespace App\Http\Livewire\QuestionBank;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\QuestionBank;
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
        $this->orderable         = (new QuestionBank())->orderable;
    }

    public function render()
    {
        $query = QuestionBank::with(['relatedClassName', 'relatedTestType', 'relatedAbility', 'relatedQuestionPaper'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $questionBanks = $query->paginate($this->perPage);

        return view('livewire.question-bank.index', compact('query', 'questionBanks'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('question_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        QuestionBank::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(QuestionBank $questionBank)
    {
        abort_if(Gate::denies('question_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionBank->delete();
    }
}
