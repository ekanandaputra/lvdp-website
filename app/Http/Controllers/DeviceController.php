<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Agent;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDevices()
    {
        $agent = new Agent();
        if ($agent->isMobile()) {
            $devices = Device::where('user_id', Auth::user()->id)->get();
            return view('devices_mobile', ['devices' => $devices]); 
        } else {
            $devices = Device::where('user_id', Auth::user()->id)->get();
            return view('devices', ['devices' => $devices]); 
        }
        
    }

    public function patchDevice(Request $request)
    {
        $device = Device::where('uuid', $request->uuid)->first();
        if ($device) {
            $device->user_id = $request->user_id;
            $device->location = $request->location;
            $device->description = $request->description;
            $device->save();
            if ($device->save()) {
                return Redirect::back()->with('success', 'Berhasil Menambahkan Perangkat');
            } else {
                return Redirect::back()->with('error', 'Gagal Menambahkan Perangkat');
            }
        } else {
            return Redirect::back()->with('error', 'ID Perangkat Tidak Terdaftar, Cek Kembali ID pada Perangkat Anda');
        }
    }

}
