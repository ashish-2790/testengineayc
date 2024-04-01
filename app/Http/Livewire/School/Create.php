<?php

namespace App\Http\Livewire\School;

use App\Models\ClassMaster;
use App\Models\School;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public School $school;

    public array $class_name = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->school->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(School $school)
    {
        $this->school           = $school;
        $this->school->inactive = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.school.create');
    }

    public function submit()
    {
        $this->validate();

        $this->school->save();
        $this->school->className()->sync($this->class_name);
        $this->syncMedia();

        return redirect()->route('admin.schools.index');
    }

    protected function rules(): array
    {
        return [
            'class_name' => [
                'array',
            ],
            'class_name.*.id' => [
                'integer',
                'exists:class_masters,id',
            ],
            'school.name' => [
                'string',
                'nullable',
            ],
            'school.address' => [
                'string',
                'nullable',
            ],
            'mediaCollections.school_logo_square' => [
                'array',
                'nullable',
            ],
            'mediaCollections.school_logo_square.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.school_logo_wide' => [
                'array',
                'nullable',
            ],
            'mediaCollections.school_logo_wide.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'school.email' => [
                'email:rfc',
                'nullable',
            ],
            'school.website' => [
                'string',
                'nullable',
            ],
            'school.phone_no' => [
                'string',
                'nullable',
            ],
            'school.school_code' => [
                'string',
                'nullable',
            ],
            'school.affiliation' => [
                'string',
                'nullable',
            ],
            'school.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['class_name'] = ClassMaster::pluck('class_name', 'id')->toArray();
    }
}
