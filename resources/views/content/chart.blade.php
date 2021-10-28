@extends('../layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Monitoring LVDP - Grafik</h1> <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Tegangan</h6>
        </div>
        <div class="card-body">
            <canvas id="voltage_chart" height="200" width="600"></canvas>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Arus</h6>
        </div>
        <div class="card-body">
            <canvas id="current_chart" height="200" width="600"></canvas>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Daya</h6>
        </div>
        <div class="card-body">
            <canvas id="power_chart" height="200" width="600"></canvas>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Daya Semu</h6>
        </div>
        <div class="card-body">
            <canvas id="apparent_power_chart" height="200" width="600"></canvas>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Power Factor</h6>
        </div>
        <div class="card-body">
            <canvas id="power_factor_chart" height="200" width="600"></canvas>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var date = <?php echo $date; ?>;
    var voltage_r = <?php echo $voltage_r; ?>;
    var voltage_s = <?php echo $voltage_s; ?>;
    var voltage_t = <?php echo $voltage_t; ?>;
    var current_r = <?php echo $current_r; ?>;
    var current_s = <?php echo $current_s; ?>;
    var current_t = <?php echo $current_t; ?>;
    var power_r = <?php echo $power_r; ?>;
    var power_s = <?php echo $power_s; ?>;
    var power_t = <?php echo $power_t; ?>;
    var apparent_power_r = <?php echo $apparent_power_r; ?>;
    var apparent_power_s = <?php echo $apparent_power_s; ?>;
    var apparent_power_t = <?php echo $apparent_power_t; ?>;
    var power_factor_r = <?php echo $power_factor_r; ?>;
    var power_factor_s = <?php echo $power_factor_s; ?>;
    var power_factor_t = <?php echo $power_factor_t; ?>;

    var chartData = {
        labels: date,
        datasets: [
            {
                label: 'Tegangan R',
                data: voltage_r
            }, {
                label: 'Tegangan S',
                data: voltage_s
            }, {
                label: 'Tegangan T',
                data: voltage_t
            }
        ]
    };

    var currentData = {
        labels: date,
        datasets: [
            {
                label: 'Arus R',
                data: current_r
            }, {
                label: 'Arus S',
                data: current_s
            }, {
                label: 'Arus T',
                data: current_t
            }
        ]
    };

    var powerData = {
        labels: date,
        datasets: [
            {
                label: 'Daya R',
                data: power_r
            }, {
                label: 'Daya S',
                data: power_s
            }, {
                label: 'Daya T',
                data: power_t
            }
        ]
    };

    var apprentPowerData = {
        labels: date,
        datasets: [
            {
                label: 'Daya Semu R',
                data: apparent_power_r
            }, {
                label: 'Daya Semu S',
                data: apparent_power_s
            }, {
                label: 'Daya Semu T',
                data: apparent_power_t
            }
        ]
    };

    var powerFactorData = {
        labels: date,
        datasets: [
            {
                label: 'Power Faktor R',
                data: power_factor_r
            }, {
                label: 'Power Faktor S',
                data: power_factor_s
            }, {
                label: 'Power Faktor T',
                data: power_factor_t
            }
        ]
    };

    window.onload = function() {
        var ctx = document.getElementById("voltage_chart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: false,
                    text: 'Grafik Tegangan'
                }
            }
        });

        var ctx = document.getElementById("current_chart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: currentData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: false,
                    text: 'Grafik Arus'
                }
            }
        });

        var ctx = document.getElementById("power_chart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: powerData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: false,
                    text: 'Grafik Daya'
                }
            }
        });

        var ctx = document.getElementById("apparent_power_chart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: apprentPowerData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: false,
                    text: 'Grafik Daya'
                }
            }
        });

        var ctx = document.getElementById("power_factor_chart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: powerFactorData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: false,
                    text: 'Grafik Daya'
                }
            }
        });
    };
</script>

@endsection