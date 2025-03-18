<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function store(Request $request,$device_id)
    {
        $request->validate([
           'data' => 'required|array'
        ]);
        $device = Device::find($device_id);
        $sensor = new Sensor([
            'device_id' => $device_id,
            'data' =>$request->data
        ]);
        $sensor->save();
        return response()->json([
            'message' => 'Data Successfully Recorded',
            'sensor' => $sensor,
        ]);
    }
}
