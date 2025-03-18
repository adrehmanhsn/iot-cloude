<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        return view('device.index');
    }

    public function show($id)
    {
        $device = Device::findOrfail($id);
        return view('device.show', compact('device'));
    }
    public function edit($id)
    {
        $device = Device::findOrfail($id);
        return view('device.edit', compact('device'));
    }

}
