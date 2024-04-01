<?php

namespace App\Http\Livewire\AbilityMaster;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\AbilityMaster;
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
        $this->orderable         = (new AbilityMaster())->orderable;
    }

    public function render()
    {
        $query = AbilityMaster::with(['relatedClassName', 'relatedTest'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $abilityMasters = $query->paginate($this->perPage);

        return view('livewire.ability-master.index', compact('abilityMasters', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('ability_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AbilityMaster::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(AbilityMaster $abilityMaster)
    {
        abort_if(Gate::denies('ability_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abilityMaster->delete();
    }
}
