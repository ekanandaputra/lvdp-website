<?php

namespace App\Http\Controllers;

use App\Exports\SensorExport;
use Illuminate\Http\Request;
use App\Models\Sensor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Pusher\Pusher;
class SensorController extends Controller
{

    public function getLocationName($device_uuid)
    {
        $device = DB::table('devices')->where('uuid', '=', $device_uuid)->first();
        return $device->location;
    }

    public function storeSensors(Request $request)
    {
        $voltage_r = $request->voltage_r;
        $voltage_s = $request->voltage_s;
        $voltage_t = $request->voltage_t;
        $current_r = abs($request->current_r);
        $current_s = abs($request->current_s);
        $current_t = abs($request->current_t);
        $realpower_r = abs($request->realpower_r);
        $realpower_s = abs($request->realpower_s);
        $realpower_t = abs($request->realpower_t);
        $apparent_power_r = round(abs($request->voltage_r*$request->current_r),2);
        $apparent_power_s = round(abs($request->voltage_s*$request->current_s),2);
        $apparent_power_t = round(abs($request->voltage_t*$request->current_t),2);
        $power_factor_r = round(abs($request->realpower_r/($request->voltage_r*$request->current_r)),2);
        $power_factor_s = round(abs($request->realpower_s/($request->voltage_s*$request->current_s)),2);
        $power_factor_t = round(abs($request->realpower_t/($request->voltage_t*$request->current_t)),2);

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), 
            $options
        );
 
        $sensor = Sensor::create([
            'voltage_r' => $voltage_r,
            'voltage_s' => $voltage_s,
            'voltage_t' => $voltage_t,
            'current_r' => $current_r,
            'current_s' => $current_s,
            'current_t' => $current_t,
            'power_r' => $realpower_r,
            'power_s' => $realpower_s,
            'power_t' => $realpower_t,
            'apparent_power_r' => $apparent_power_r,
            'apparent_power_s' => $apparent_power_s,
            'apparent_power_t' => $apparent_power_t,
            'power_factor_r' => $power_factor_r,
            'power_factor_s' => $power_factor_s,
            'power_factor_t' => $power_factor_t,
            'device_id' => $request->device_id
        ]);
        if ($sensor) {
            $data['voltage_r'] = $voltage_r;
            $data['voltage_s'] = $voltage_s;
            $data['voltage_t'] = $voltage_t;
            $data['current_r'] = $current_r;
            $data['current_s'] = $current_s;
            $data['current_t'] = $current_t;
            $data['power_r'] = $realpower_r;
            $data['power_s'] = $realpower_s;
            $data['power_t'] = $realpower_t;
            $data['apparent_power_r'] = $apparent_power_r;
            $data['apparent_power_s'] = $apparent_power_s;
            $data['apparent_power_t'] = $apparent_power_t;
            $data['power_factor_r'] = $power_factor_r;
            $data['power_factor_s'] = $power_factor_s;
            $data['power_factor_t'] = $power_factor_t;
            $pusher->trigger('device_'.$request->device_id, 'App\\Events\\Notify', $data);    
            return 200;
        } else {
            return 500;
        }
    }

    public function getData($device_uuid)
    {
        $sensor = DB::table('sensors')->where('device_id', '=', $device_uuid)->orderBy('id', 'DESC')->first();
        return response()->json($sensor, 200);
    }   

    public function getDataChart($device_uuid)
    {
        $sensor = DB::table('sensors')->where('device_id', '=', $device_uuid)->orderBy('id', 'DESC')->limit(5)->get();
        return response()->json($sensor, 200);
    }   

    public function getDashboard($device_uuid)
    {
        return view('monitoring.content.dashboard', ['device_id' => $device_uuid, 'location_name'=> $this->getLocationName($device_uuid)]);
    }

    public function getTable($device_uuid)
    {
        $currentTime = Carbon::now()->toDateString();

        $line_r = DB::table('sensors')->where('device_id', '=', $device_uuid)->whereBetween('created_at', [$currentTime.' 00:00:00', $currentTime.' 23:59:59'])->orderBy('id', 'DESC')->paginate(25, ['*'], 'line_r');
        $line_s = DB::table('sensors')->where('device_id', '=', $device_uuid)->whereBetween('created_at', [$currentTime.' 00:00:00', $currentTime.' 23:59:59'])->orderBy('id', 'DESC')->paginate(25, ['*'], 'line_s');
        $line_t = DB::table('sensors')->where('device_id', '=', $device_uuid)->whereBetween('created_at', [$currentTime.' 00:00:00', $currentTime.' 23:59:59'])->orderBy('id', 'DESC')->paginate(25, ['*'], 'line_t');
        return view('monitoring.content.table', ['date' => $currentTime, 'line_r' => $line_r, 'line_s' => $line_s, 'line_t' => $line_t, 'device_id' => $device_uuid, 'location_name'=> $this->getLocationName($device_uuid) ]);
    }

    public function getTableFilter($device_uuid, Request $request)
    {
        session()->flashInput($request->input());
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        switch ($request->input('action')) {
            case 'filter':
                $line_r = DB::table('sensors')->where('device_id', '=', $device_uuid)->whereBetween('created_at', [$start_date.' 00:00:00', $end_date.' 23:59:59'])->orderBy('id', 'DESC')->paginate(25, ['*'], 'line_r');
                $line_s = DB::table('sensors')->where('device_id', '=', $device_uuid)->whereBetween('created_at', [$start_date.' 00:00:00', $end_date.' 23:59:59'])->orderBy('id', 'DESC')->paginate(25, ['*'], 'line_s');
                $line_t = DB::table('sensors')->where('device_id', '=', $device_uuid)->whereBetween('created_at', [$start_date.' 00:00:00', $end_date.' 23:59:59'])->orderBy('id', 'DESC')->paginate(25, ['*'], 'line_t');
                return view('monitoring.content.table', ['line_r' => $line_r, 'line_s' => $line_s, 'line_t' => $line_t, 'device_id' => $device_uuid, 'location_name'=> $this->getLocationName($device_uuid) ]);
                break;
            case 'export':
                return Excel::download(new SensorExport($device_uuid, $start_date, $end_date), 'export-sensor.xlsx');
                break;
        }

        
        
    }

    public function getChart($device_uuid)
    {
        return view('monitoring.content.chart', ['device_id' => $device_uuid, 'location_name'=> $this->getLocationName($device_uuid)]);
    }

}
