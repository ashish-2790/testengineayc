<?php

namespace App\Http\Livewire\StreamMaster;

use App\Models\StreamGroup;
use App\Models\StreamMaster;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public StreamMaster $streamMaster;

    public function mount(StreamMaster $streamMaster)
    {
        $this->streamMaster = $streamMaster;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.stream-master.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->streamMaster->save();

        return redirect()->route('admin.stream-masters.index');
    }

    protected function rules(): array
    {
        return [
            'streamMaster.group_master_id' => [
                'integer',
                'exists:stream_groups,id',
                'nullable',
            ],
            'streamMaster.stream_name' => [
                'string',
                'nullable',
            ],
            'streamMaster.stream_description' => [
                'string',
                'nullable',
            ],
            'streamMaster.icon_url' => [
                'string',
                'nullable',
            ],
            'streamMaster.inactive' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['group_master'] = StreamGroup::pluck('stream_group_master', 'id')->toArray();
    }
}
