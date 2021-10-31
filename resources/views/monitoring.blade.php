<!doctype html>
<html lang="en">

<head>
    <title>Monitoring</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                    <h1 class="text-3xl font-semibold">220 Volt</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Arus</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Semu</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Nyata</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Power Factor</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
            </div>
        </div>
        <div class="rounded-md border border-primary flex flex-col">
            <h1 class="font-semibold text-2xl bg-primary p-3 text-white">Line S </h1>
            <div class="line-body flex flex-col p-3 gap-3">
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Tegangan</h1>
                    <h1 class="text-3xl font-semibold">220 Volt</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Arus</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Semu</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Nyata</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Power Factor</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
            </div>
        </div>
        <div class="rounded-md border border-primary flex flex-col">
            <h1 class="font-semibold text-2xl bg-primary p-3 text-white">Line T </h1>
            <div class="line-body flex flex-col p-3 gap-3">
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Tegangan</h1>
                    <h1 class="text-3xl font-semibold">220 Volt</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Arus</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Semu</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Daya Nyata</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
                <div class="rounded-md flex flex-col p-3 border border-gray-300 items-center shadow-md gap-2">
                    <h1 class="text-base flex-grow text-primary">Power Factor</h1>
                    <h1 class="text-3xl font-semibold">2 Ampere</h1>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>