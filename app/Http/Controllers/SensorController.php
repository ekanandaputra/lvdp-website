<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SensorController extends Controller
{
    public function storeSensors(Request $request)
    {
        // $this->validate($request,[
        // 	'nama' => 'required',
        // 	'alamat' => 'required'
        // ]);
 
        $sensor = Sensor::create([
            'voltage_r' => $request->voltage_r,
            'voltage_s' => $request->voltage_s,
            'voltage_t' => $request->voltage_t,
            'current_r' => abs($request->current_r),
            'current_s' => abs($request->current_s),
            'current_t' => abs($request->current_t),
            'power_r' =>abs($request->realpower_r),
            'power_s' => abs($request->realpower_s),
            'power_t' => abs($request->realpower_t),
            'apparent_power_r' => round(abs($request->voltage_r*$request->current_r),2),
            'apparent_power_s' => round(abs($request->voltage_s*$request->current_s),2),
            'apparent_power_t' => round(abs($request->voltage_t*$request->current_t),2),
            'power_factor_r' => round(abs($request->realpower_r/($request->voltage_r*$request->current_r)),2),
            'power_factor_s' => round(abs($request->realpower_s/($request->voltage_s*$request->current_s)),2),
            'power_factor_t' => round(abs($request->realpower_t/($request->voltage_t*$request->current_t)),2),
            'device_id' => 1111
        ]);
        if ($sensor) {
            return 200;
        } else {
            return 500;
        }
    }

    public function monitoringTable()
    {
        $sensor = DB::table('sensors')->orderBy('id', 'DESC')->paginate(40);
        $title="Monitoring LVDP - Tabel";
        return view('content.table', ['sensor' => $sensor, 'title' => $title]);
    }

    public function monitoringTableFilter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $title="Monitoring LVDP - Tabel Periode: ".$start_date." Sampai ".$end_date;
        $sensor = DB::table('sensors')->whereBetween('created_at', [$start_date.' 00:00:00', $end_date.' 23:59:59'])->orderBy('id', 'DESC')->paginate(40);
        return view('content.table', ['sensor' => $sensor, 'title' => $title]);
    }

    public function getData($device_uuid)
    {
        $sensor = DB::table('sensors')->where('device_id', '=', $device_uuid)->orderBy('id', 'DESC')->first();
        return response()->json($sensor, 200);
    }   

    public function getDashboard()
    {
        return view('monitoring');
    }
    
    public function sensorData($param, $device_id)
    {
        $sensor = DB::table('sensors')->where('device_id', '=', $device_id)->orderBy('id', 'DESC')->first();
        switch ($param) {
            case "vr":
                return $sensor->voltage_r." V";
            case "vs":
                return $sensor->voltage_s." V";
            case "vt":
                return $sensor->voltage_t." V";
            case "ir":
                return $sensor->current_r." A";
            case "is":
                return $sensor->current_s." A";
            case "it":
                return $sensor->current_t." A";
            case "pr":
                return $sensor->power_r." Watt";
            case "ps":
                return $sensor->power_s." Watt";
            case "pt":
                return $sensor->power_t." Watt";
            case "sr":
                return $sensor->apparent_power_r." VA";
            case "ss":
                return $sensor->apparent_power_s." VA";
            case "st":
                return $sensor->apparent_power_t." VA";
            case "pfr":
                return $sensor->power_factor_r;
            case "pfs":
                return $sensor->power_factor_s;
            case "pft":
                return $sensor->power_factor_t;
            default:
        }
    }

    public function monitoringChart()
    {
        $date = array();
        $voltage_r = array();
        $voltage_s = array();
        $voltage_t = array();
        $current_r = array();
        $current_s = array();
        $current_t = array();
        $power_r = array();
        $power_s = array();
        $power_t = array();
        $apparent_power_r = array();
        $apparent_power_s = array();
        $apparent_power_t = array();
        $power_factor_r = array();
        $power_factor_s = array();
        $power_factor_t = array();

        $query = DB::table('sensors')->orderBy('id', 'DESC')->limit(40)->get();
        foreach ($query as $data) {
            array_push($date, $data->created_at);
            array_push($voltage_r, $data->voltage_r);
            array_push($voltage_s, $data->voltage_s);
            array_push($voltage_t, $data->voltage_t);
            array_push($current_r, $data->current_r);
            array_push($current_s, $data->current_s);
            array_push($current_t, $data->current_t);
            array_push($power_r, $data->power_r);
            array_push($power_s, $data->power_s);
            array_push($power_t, $data->power_t);
            array_push($apparent_power_r, $data->apparent_power_r);
            array_push($apparent_power_s, $data->apparent_power_s);
            array_push($apparent_power_t, $data->apparent_power_t);
            array_push($power_factor_r, $data->power_factor_r);
            array_push($power_factor_s, $data->power_factor_s);
            array_push($power_factor_t, $data->power_factor_t);
        }
        return view('content.chart')
        ->with('date', json_encode(array_reverse($date), JSON_NUMERIC_CHECK))
        ->with('voltage_r', json_encode(array_reverse($voltage_r), JSON_NUMERIC_CHECK))
        ->with('voltage_s', json_encode(array_reverse($voltage_s), JSON_NUMERIC_CHECK))
        ->with('voltage_t', json_encode(array_reverse($voltage_t), JSON_NUMERIC_CHECK))
        ->with('current_r', json_encode(array_reverse($current_r), JSON_NUMERIC_CHECK))
        ->with('current_s', json_encode(array_reverse($current_s), JSON_NUMERIC_CHECK))
        ->with('current_t', json_encode(array_reverse($current_t), JSON_NUMERIC_CHECK))
        ->with('power_r', json_encode(array_reverse($power_r), JSON_NUMERIC_CHECK))
        ->with('power_s', json_encode(array_reverse($power_s), JSON_NUMERIC_CHECK))
        ->with('power_t', json_encode(array_reverse($power_t), JSON_NUMERIC_CHECK))
        ->with('apparent_power_r', json_encode(array_reverse($apparent_power_r), JSON_NUMERIC_CHECK))
        ->with('apparent_power_s', json_encode(array_reverse($apparent_power_s), JSON_NUMERIC_CHECK))
        ->with('apparent_power_t', json_encode(array_reverse($apparent_power_t), JSON_NUMERIC_CHECK))
        ->with('power_factor_r', json_encode(array_reverse($power_factor_r), JSON_NUMERIC_CHECK))
        ->with('power_factor_s', json_encode(array_reverse($power_factor_s), JSON_NUMERIC_CHECK))
        ->with('power_factor_t', json_encode(array_reverse($power_factor_t), JSON_NUMERIC_CHECK));
    }
}
