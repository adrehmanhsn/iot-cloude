<?php

namespace App\Livewire\Devices;

use App\Models\Device;
use Livewire\Component;

class ShowDevice extends Component
{
    public $device_id;
    public $device;
    public function mount($device_id): void
    {
        $this->device_id = $device_id;
        $this->device = Device::with('sensor')->findOrFail($this->device_id);
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.devices.show-device', [
            'device'=>$this->device,
        ]);
    }
}
