<?php

namespace App\Livewire\Devices;
use Illuminate\contracts\view\factory;
use Illuminate\contracts\view\View;
use App\Models\Device;
use App\Models\User;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CreateDevice extends Component
{
    public $users, $name, $device_type, $device_identifier, $user_id;

    public function mount():void
    {
        $this->users = User::all();
    }

    public function submit(): void
    {
        $this->validate([
            'name'=>'required|string|max:255',
            'device_type'=>'required|string|max:255',
            'user_id'=>'required|exists:users,id',
        ]);
        Device::create([
            'user_id'=>$this->user_id,
            'name'=>$this->name,
            'device_type'=>$this->device_type,
            'device_identifier'=>Str::uuid(),
        ]);
        $this->dispatch('deviceCreated');
        $this->reset('name', 'device_type', 'device_identifier', 'user_id');
    }

    public function render():Factory|Application|view|\Illuminate\view\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.devices.create-device', ['users' => $this->users]);
    }
}
