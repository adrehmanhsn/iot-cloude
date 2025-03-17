<?php

namespace App\Livewire\Devices;

use App\Models\Device;
use Faker\Factory;
use Livewire\Component;
use PHPUnit\TextUI\Application;

class DevicesIndex extends Component
{
    public function render():Factory|Application|\Illuminate\Contracts\view\View|\Illuminate\Contracts\Foundation\Application
    {
        $devices = Device::with('user')->paginate(10);
        return view('livewire.devices.devices-index', ['devices'=>$devices]);
    }
}
