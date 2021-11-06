@extends('monitoring/layout')
@section('content')
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
            $.ajax({
            url: "/dashboard/"+ {{$device_id}} +"/sensor",
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
    });
</script>
@endsection