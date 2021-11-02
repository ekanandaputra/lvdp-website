<!doctype html>
<html lang="en">

<head>
    <title>Monitoring</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="">
    <div class="w-full h-40 bg-primary px-32 flex items-center ">
        <div class="flex flex-col w-3/6">
            <h1 class="text-3xl font-semibold text-white">
                Halaman Monitoring,
            </h1>
            <p class="text-xl text-white">Nama Lokasi</p>
        </div>
    </div>
    <div class="navigation px-32 py-3 flex flex-row gap-6">
        <button class="bg-primary border border-primary px-3 py-1 w-32 text-white rounded-md text-base"> Dashboard
        </button>
        <button class="bg-white border border-primary px-3 py-1 w-32 text-primary rounded-md text-base"> Tabel </button>
        <button class="bg-white border border-primary px-3 py-1 w-32 text-primary rounded-md text-base"> Grafik
        </button>
    </div>
    <div class="px-32 grid grid-cols-3 gap-3">
        <div class="rounded-md border border-primary flex flex-col">
            <h1 class="font-semibold text-2xl bg-primary p-3 text-white">Line R </h1>
            <div class="line-body flex flex-col p-3 gap-3">
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Tegangan</h1>
                    <h1 class="text-3xl font-semibold" id="vR">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Arus</h1>
                    <h1 class="text-3xl font-semibold" id="iR">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Nyata</h1>
                    <h1 class="text-3xl font-semibold" id="pR">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Semu</h1>
                    <h1 class="text-3xl font-semibold" id="sR">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Power Factor</h1>
                    <h1 class="text-3xl font-semibold" id="pfR">-</h1>
                </div>
            </div>
        </div>
        <div class="rounded-md border border-primary flex flex-col">
            <h1 class="font-semibold text-2xl bg-primary p-3 text-white">Line S </h1>
            <div class="line-body flex flex-col p-3 gap-3">
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Tegangan</h1>
                    <h1 class="text-3xl font-semibold" id="vS">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Arus</h1>
                    <h1 class="text-3xl font-semibold" id="iS">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Nyata</h1>
                    <h1 class="text-3xl font-semibold" id="pS">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Semu</h1>
                    <h1 class="text-3xl font-semibold" id="sS">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Power Factor</h1>
                    <h1 class="text-3xl font-semibold" id="pfS">-</h1>
                </div>
            </div>
        </div>
        <div class="rounded-md border border-primary flex flex-col">
            <h1 class="font-semibold text-2xl bg-primary p-3 text-white">Line T </h1>
            <div class="line-body flex flex-col p-3 gap-3">
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Tegangan</h1>
                    <h1 class="text-3xl font-semibold" id="vT">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Arus</h1>
                    <h1 class="text-3xl font-semibold" id="iT">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Nyata</h1>
                    <h1 class="text-3xl font-semibold" id="pT">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Semu</h1>
                    <h1 class="text-3xl font-semibold" id="sT">-</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Power Factor</h1>
                    <h1 class="text-3xl font-semibold" id="pfT">-</h1>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $.ajax({
                url: "/monitoring/1111/sensor",
                success: function( response ) {
                    $("#vR").html(response.voltage_r + " Volt");
                    $("#iR").html(response.current_r + " Ampere");
                    $("#pR").html(response.power_r + " Watt");
                    $("#sR").html(response.apparent_power_r + " VA");
                    $("#pfR").html(response.power_factor_r);
                    $("#vS").html(response.voltage_s + " Volt");
                    $("#iS").html(response.current_s + " Ampere");
                    $("#pS").html(response.power_s + " Watt");
                    $("#sS").html(response.apparent_power_s + " VA");
                    $("#pfS").html(response.power_factor_s);
                    $("#vT").html(response.voltage_t + " Volt");
                    $("#iT").html(response.current_t + " Ampere");
                    $("#pT").html(response.power_t + " Watt");
                    $("#sT").html(response.apparent_power_t + " VA");
                    $("#pfT").html(response.power_factor_t);
                }
                });
            },10000);
            });
    </script>
</body>

</html>