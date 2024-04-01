<?php

namespace App\Http\Livewire\CourseMaster;

use App\Models\CollegeMaster;
use App\Models\CourseMaster;
use App\Models\StreamMaster;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public CourseMaster $courseMaster;

    public array $related_college = [];

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->courseMaster->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(CourseMaster $courseMaster)
    {
        $this->courseMaster    = $courseMaster;
        $this->related_college = $this->courseMaster->relatedCollege()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [

            'course_master_related_image' => $courseMaster->related_image,

        ];
    }

    public function render()
    {
        return view('livewire.course-master.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->courseMaster->save();
        $this->courseMaster->relatedCollege()->sync($this->related_college);
        $this->syncMedia();

        return redirect()->route('admin.course-masters.index');
    }

    protected function rules(): array
    {
        return [
            'courseMaster.stream_id' => [
                'integer',
                'exists:stream_masters,id',
                'nullable',
            ],
            'courseMaster.course_name' => [
                'string',
                'nullable',
            ],
            'courseMaster.course_description' => [
                'string',
                'nullable',
            ],
            'related_college' => [
                'array',
            ],
            'related_college.*.id' => [
                'integer',
                'exists:college_masters,id',
            ],
            'courseMaster.image_url' => [
                'string',
                'nullable',
            ],
            'mediaCollections.course_master_related_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.course_master_related_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'courseMaster.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['stream']          = StreamMaster::pluck('stream_name', 'id')->toArray();
        $this->listsForFields['related_college'] = CollegeMaster::pluck('college_name', 'id')->toArray();
    }
}
