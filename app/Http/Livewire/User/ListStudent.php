<?php

namespace App\Http\Livewire\User;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;

class ListStudent extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $listsForFields = [];

    public array $paginationOptions;

    public $related_school_name ;

    protected $students;

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
        $this->orderable         = (new User())->orderable;


        $this->initListsForFields();

        if(auth()->user()->is_admin == 1) {
            $query = User::with(['relatedSchoolName', 'relatedClassName', 'relatedTestType', 'roles'])
                ->wherehas('roles', function ($query) {
                    $query->where('title', 'Student');
                })
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
        }elseif(auth()->user()->is_school == 1){
            $query = User::with(['relatedSchoolName', 'relatedClassName', 'relatedTestType', 'roles'])
                ->where('related_school_name_id', auth()->user()->related_school_name_id)
                ->wherehas('roles', function ($query) {
                    $query->where('title', 'Student');
                })
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
        }

        $this->students = $query->paginate($this->perPage);

    }

    public function render()
    {
    $users = $this->students;
        return view('livewire.user.list-student',compact('users'));

        //return view('livewire.user.index', compact('query', 'users'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        User::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['related_school_name'] = School::pluck('name', 'id')->toArray();
    }

    public function updatedRelatedSchoolName($value)
    {
        if(auth()->user()->is_admin == 1) {
            $query = User::with(['relatedSchoolName', 'relatedClassName', 'relatedTestType', 'roles'])
                ->where('related_school_name_id', $value)
                ->wherehas('roles', function ($query) {
                    $query->where('title', 'Student');
                })
                ->advancedFilter([
                    's'               => $this->search ?: null,
                    'order_column'    => $this->sortBy,
                    'order_direction' => $this->sortDirection,
                ]);
        }

        $this->students = $query->paginate($this->perPage);

    }

}
