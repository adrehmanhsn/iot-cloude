<?php

namespace App\Livewire\Sensor;
use Illuminate\contracts\view\factory;
use Illuminate\contracts\view\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class SensorLiveUpdate extends Component
{
    public $device_id;
    public $tempr = "N/A";
    public $hum = "N/A";

    public function mount($device_id):void
    {
        $this->device_id = $device_id;
        $this->fetchData();

    }
    public function fetchData():void
    {
        $cacheKey = "device_{$this->device_id}_sensor_data";
        $latestSensorData = Cache::get($cacheKey);

        if($latestSensorData){
            $this->tempr = $latestSensorData['temperature'] ?? $latestSensorData;
            $this->hum = $latestSensorData['humidty'] ?? 'N/A';
        }else{
            $this->tempr = 'N/A';
            $this->hum = 'N/A';
        }
    }
    public function render(): Factory|Application|view|\Illuminate\view\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.sensor.sensor-live-update');
    }
}
