<?php

namespace App\Http\Livewire\StudentMainReport;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\StudentMainReport;
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
        $this->orderable         = (new StudentMainReport())->orderable;
    }

    public function render()
    {
        $query = StudentMainReport::with(['relatedStudentName', 'relatedClassName', 'relatedTestName', 'relatedAbilityName', 'createTest', 'relatedReportTemplate'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $studentMainReports = $query->paginate($this->perPage);

        return view('livewire.student-main-report.index', compact('query', 'studentMainReports'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('student_main_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        StudentMainReport::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(StudentMainReport $studentMainReport)
    {
        abort_if(Gate::denies('student_main_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentMainReport->delete();
    }
}
