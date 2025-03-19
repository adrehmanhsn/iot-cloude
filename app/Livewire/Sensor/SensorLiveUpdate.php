<?php

namespace App\Livewire\Sensor;
use Detection\Cache\Cache;
use Illuminate\contracts\view\factory;
use Illuminate\contracts\view\View;
use Illuminate\Foundation\Application;
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
    private function fetchData():void
    {
        $cacheKey = "device_{$this->device_id}_sensor_data}";
        $latestSensorData = Cache::get($cacheKey);

        if($latestSensorData){
            $this->tempr = $latestSensorData['temperature'] ?? 'N/A';
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
