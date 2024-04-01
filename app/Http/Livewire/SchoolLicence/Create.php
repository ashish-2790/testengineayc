<?php

namespace App\Http\Livewire\SchoolLicence;

use App\Models\ClassMaster;
use App\Models\School;
use App\Models\SchoolLicence;
use App\Models\Test;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public SchoolLicence $schoolLicence;

    public function mount(SchoolLicence $schoolLicence)
    {
        $this->schoolLicence           = $schoolLicence;
        $this->schoolLicence->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.school-licence.create');
    }

    public function submit()
    {
        $this->validate();

        $this->schoolLicence->save();

        return redirect()->route('admin.school-licences.index');
    }

    protected function rules(): array
    {
        return [
            'schoolLicence.school_name_id' => [
                'integer',
                'exists:schools,id',
                'nullable',
            ],
            'schoolLicence.related_class_name_id' => [
                'integer',
                'exists:class_masters,id',
                'nullable',
            ],
            'schoolLicence.related_test_type_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'schoolLicence.student_count' => [
                'string',
                'nullable',
            ],
            'schoolLicence.valid_from' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'schoolLicence.valid_to' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'schoolLicence.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['school_name']        = School::pluck('name', 'id')->toArray();
        $this->listsForFields['related_class_name'] = ClassMaster::pluck('class_name', 'id')->toArray();
        $this->listsForFields['related_test_type']  = Test::pluck('test_name', 'id')->toArray();
    }
}
