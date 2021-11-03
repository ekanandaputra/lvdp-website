@extends('monitoring/layout')
@section('content')
<div class="content px-32 py-3 grid grid-cols-2 gap-3">
    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Grafik Tegangan
        </h1>
        <div style="height:40vh" class="overflow-hidden">
            <canvas id="voltage"></canvas>
        </div>
    </div>
    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Grafik Arus
        </h1>
        <div style="height:40vh" class="overflow-hidden">
            <canvas id="current"></canvas>
        </div>
    </div>
    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Grafik Daya Nyata
        </h1>
        <div style="height:40vh" class="overflow-hidden">
            <canvas id="power"></canvas>
        </div>
    </div>
    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Grafik Daya Semu
        </h1>
        <div style="height:40vh" class="overflow-hidden">
            <canvas id="apparent_power"></canvas>
        </div>
    </div>
    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Grafik Power Factor
        </h1>
        <div style="height:40vh" class="overflow-hidden">
            <canvas id="power_factor"></canvas>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "/chart/"+ {{ $device_id }} +"/sensor",
            method: "GET",
            success: function(data) {
                var label = [];
                var voltage_r = [];
                var voltage_s = [];
                var voltage_t = [];
                var current_r = [];
                var current_s = [];
                var current_t = [];
                var power_r = [];
                var power_s = [];
                var power_t = [];
                var apparent_power_r = [];
                var apparent_power_s = [];
                var apparent_power_t = [];
                var power_factor_r = [];
                var power_factor_s = [];
                var power_factor_t = [];
                

                for (var i in data) {
                    label.push(data[i].created_at.split(" ")[1]);
                    voltage_r.push(data[i].voltage_r);
                    voltage_s.push(data[i].voltage_s);
                    voltage_t.push(data[i].voltage_t);
                    current_r.push(data[i].current_r);
                    current_s.push(data[i].current_s);
                    current_t.push(data[i].current_t);
                    power_r.push(data[i].power_r);
                    power_s.push(data[i].power_s);
                    power_t.push(data[i].power_t);
                    apparent_power_r.push(data[i].apparent_power_r);
                    apparent_power_s.push(data[i].apparent_power_s);
                    apparent_power_t.push(data[i].apparent_power_t);
                    power_factor_r.push(data[i].power_factor_r);
                    power_factor_s.push(data[i].power_factor_s);
                    power_factor_t.push(data[i].power_factor_t);
                }
                var ctx = document.getElementById('voltage').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'Line R',
                                borderColor: 'rgb(255, 0, 0)',
                                data: voltage_r
                            },
                            {
                                label: 'Line S',
                                borderColor: 'rgb(0, 255, 0)',
                                data: voltage_s
                            },
                            {
                                label: 'Line T',
                                borderColor: 'rgb(0, 0, 255)',
                                data: voltage_t
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                var ctxCurrent = document.getElementById('current').getContext('2d');
                var chartCurrent = new Chart(ctxCurrent, {
                    type: 'line',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'Line R',
                                borderColor: 'rgb(255, 0, 0)',
                                data: current_r
                            },
                            {
                                label: 'Line S',
                                borderColor: 'rgb(0, 255, 0)',
                                data: current_s
                            },
                            {
                                label: 'Line T',
                                borderColor: 'rgb(0, 0, 255)',
                                data: current_t
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                var ctxPower = document.getElementById('power').getContext('2d');
                var chartPower = new Chart(ctxPower, {
                    type: 'line',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'Line R',
                                borderColor: 'rgb(255, 0, 0)',
                                data: power_r
                            },
                            {
                                label: 'Line S',
                                borderColor: 'rgb(0, 255, 0)',
                                data: power_s
                            },
                            {
                                label: 'Line T',
                                borderColor: 'rgb(0, 0, 255)',
                                data: power_t
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                var ctxApparentPower = document.getElementById('apparent_power').getContext('2d');
                var chartApparentPower = new Chart(ctxApparentPower, {
                    type: 'line',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'Line R',
                                borderColor: 'rgb(255, 0, 0)',
                                data: apparent_power_r
                            },
                            {
                                label: 'Line S',
                                borderColor: 'rgb(0, 255, 0)',
                                data: apparent_power_s
                            },
                            {
                                label: 'Line T',
                                borderColor: 'rgb(0, 0, 255)',
                                data: apparent_power_t
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                var ctxPowerFactor = document.getElementById('power_factor').getContext('2d');
                var chartPowerFactor = new Chart(ctxPowerFactor, {
                    type: 'line',
                    data: {
                        labels: label,
                        datasets: [
                            {
                                label: 'Line R',
                                borderColor: 'rgb(255, 0, 0)',
                                data: power_factor_r
                            },
                            {
                                label: 'Line S',
                                borderColor: 'rgb(0, 255, 0)',
                                data: power_factor_s
                            },
                            {
                                label: 'Line T',
                                borderColor: 'rgb(0, 0, 255)',
                                data: power_factor_t
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

            }
        });

    });
</script>

@endsection