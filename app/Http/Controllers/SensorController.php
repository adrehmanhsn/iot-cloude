<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SensorController extends Controller
{
    public function store(Request $request, $device_id)
    {
        $request->validate([
           'data' => 'required|array'
        ]);
        $device = Device::findOrFail($device_id);
        $data = $request->data;

        $cacheKey = "device_{$device_id}_sensor_data";
        Cache::put($cacheKey, $data, now()->addSecond(4));

        if (isset($data['temperature']) && $data['temperature']>100)
        {
            $sensor = new Sensor([
                'device_id' => $device->id,
                'data' =>$data
            ]);
            $sensor->save();
            return response()->json([
                'message' => 'High Temperature Recorded, Data saved',
                'sensor' => $sensor,
            ]);
        }
//        return response()->json(['message' => $data]);
        return response()->json([
            'message' => 'Data received and cached, no critical action needed ',
        ]);
    }
}
