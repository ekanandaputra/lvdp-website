<!doctype html>
<html lang="en">

<head>
    <title>Hardware List</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="">
    <div class="w-full h-24 bg-primary">
    </div>
    <div class="flex justify-center w-full -mt-10">
        <div class="w-full bg-white rounded-md px-6 py-3 shadow-md mx-6">
            <div class="flex flex-col">
                <h1 class="text-2xl font-semibold">
                    Selamat Datang,
                </h1>
                <p class="text-xl">Ekananda Sulistyo Putra</p>
            </div>
        </div>
    </div>
    <div class="body py-12 px-6">
        @if (\Session::has('error'))
        <div class="p-3 bg-red-300 border border-red-500 rounded-md mb-6 bg-opacity-10">
            <p class="text-black text-sm">{!! \Session::get('error') !!}</p>
        </div>
        @endif
        @if (\Session::has('success'))
        <div class="p-3 bg-primary border border-primary rounded-md mb-6 bg-opacity-10">
            <p class="text-black text-sm">{!! \Session::get('success') !!}</p>
        </div>
        @endif
        <div class="flex flex-row items-center justify-center mb-5">
            <div class="h1 text-2xl font-semibold flex-grow">Perangkat Anda</div>
            <button class="bg-primary py-2 px-3 text-white rounded-md flex-none show-modal" id="addDevice">
                Tambah
            </button>
        </div>
        <div class="device grid grid-cols-1 gap-4">
            @foreach ($devices as $device)
            <div class="flex flex-col border border-gray-50 rounded-md shadow-md gap-3">
                <div class="flex flex-row items-center justify-center mt-3 px-3 mb-1">
                    <h1 class="text-xl font-semibold flex-grow"> {{ $device->location }} </h1>
                    <a href="/dashboard/{{ $device->uuid }}"
                        class="bg-primary py-1 px-3 text-white rounded-md flex-none text-sm">
                        Lihat Detail
                    </a>
                </div>
                <hr>
                <div class="flex flex-col px-3 mb-3 gap-1">
                    <p class="text-gray-400 text-base">{{ $device->description}}</p>
                    <p class="text-gray-400 text-sm">Last Update : 2020-20-20</p>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('modal_add_device')

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).on('click', '#addDevice', function(event) {
            $('#modalAddDevice').removeClass('hidden')
        });

        $(document).on('click', '#closeAddDevice', function(event) {
            $('#modalAddDevice').addClass('hidden')
        });
    </script>
</body>

</html>