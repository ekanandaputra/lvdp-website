<div class="w-full h-40 bg-primary px-32 flex items-center ">
    <div class="flex flex-col w-3/6">
        <h1 class="text-3xl font-semibold text-white">
            Halaman Monitoring,
        </h1>
        <p class="text-xl text-white">{{$location_name}}</p>
    </div>
</div>
<div class="navigation px-32 py-3 flex flex-row gap-6">
    <a href="/dashboard/{{ $device_id }}" class="{{ Request::segment(1) === 'dashboard' ? 'nav-active' : 'nav' }}">
        Dashboard
    </a>
    <a href="/table/{{ $device_id }}" class="{{ Request::segment(1) === 'table' ? 'nav-active' : 'nav' }}"> Tabel
    </a>
    <a href="/chart/{{ $device_id }}" class="{{ Request::segment(1) === 'chart' ? 'nav-active' : 'nav' }}"> Grafik
    </a>
</div>