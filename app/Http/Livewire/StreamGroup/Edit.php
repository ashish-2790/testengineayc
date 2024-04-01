<?php

namespace App\Http\Livewire\StreamGroup;

use App\Models\StreamGroup;
use Livewire\Component;

class Edit extends Component
{
    public StreamGroup $streamGroup;

    public function mount(StreamGroup $streamGroup)
    {
        $this->streamGroup = $streamGroup;
    }

    public function render()
    {
        return view('livewire.stream-group.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->streamGroup->save();

        return redirect()->route('admin.stream-groups.index');
    }

    protected function rules(): array
    {
        return [
            'streamGroup.stream_group_master' => [
                'string',
                'nullable',
            ],
            'streamGroup.inactive' => [
                'boolean',
            ],
        ];
    }
}
