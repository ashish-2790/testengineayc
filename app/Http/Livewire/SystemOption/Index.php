<?php

namespace App\Http\Livewire\SystemOption;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\SystemOption;
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
        $this->orderable         = (new SystemOption())->orderable;
    }

    public function render()
    {
        $query = SystemOption::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $systemOptions = $query->paginate($this->perPage);

        return view('livewire.system-option.index', compact('query', 'systemOptions'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('system_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        SystemOption::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(SystemOption $systemOption)
    {
        abort_if(Gate::denies('system_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemOption->delete();
    }
}
