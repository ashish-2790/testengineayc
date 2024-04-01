<?php

namespace App\Http\Livewire\UploadMaster;

use App\Models\UploadMaster;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public array $mediaToRemove = [];

    public UploadMaster $uploadMaster;

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
                ->update(['model_id' => $this->uploadMaster->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(UploadMaster $uploadMaster)
    {
        $this->uploadMaster = $uploadMaster;
    }

    public function render()
    {
        return view('livewire.upload-master.create');
    }

    public function submit()
    {
        $this->validate();

        $this->uploadMaster->save();
        $this->syncMedia();

        return redirect()->route('admin.upload-masters.index');
    }

    protected function rules(): array
    {
        return [
            'uploadMaster.title' => [
                'string',
                'nullable',
            ],
            'mediaCollections.upload_master_related_doc' => [
                'array',
                'nullable',
            ],
            'mediaCollections.upload_master_related_doc.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
