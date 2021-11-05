<?php

namespace App\Exports;

use App\Models\Sensor;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class SensorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(int $id, string $start_date, string $end_date)
    {
        $this->id = $id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function view(): View
    {
        $sensor = DB::table('sensors')->where('device_id', '=', $this->id)->whereBetween('created_at', [$this->start_date.' 00:00:00', $this->end_date.' 23:59:59'])->orderBy('id', 'DESC')->get();

        return view('exports.xml', [
            'data' => $sensor
        ]);
    }

    public function collection()
    {
        $line_r = DB::table('sensors')->where('device_id', '=', $device_uuid)->orderBy('id', 'DESC')->paginate(25, ['*'], 'line_r');
        return Sensor::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Tegangan R',
            'Tegangan S',
            'Tegangan T',
            'Arus R',
            'Arus S',
            'Arus T',
            'Daya R',
            'Daya S',
            'Daya T',
            'Daya Semu R',
            'Daya Semu S',
            'Daya Semu T',
            'Power Factor R',
            'Power Factor S',
            'Power Factor T',
            'ID Perangkat',
            'Tanggal',
        ];
    }

}
