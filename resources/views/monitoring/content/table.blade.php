@extends('monitoring/layout')
@section('content')

<div class="content px-32 py-3 flex flex-col gap-6">
    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg p-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black">
            Form Filter
        </h1>
        <div class="flex flex-row gap-3">
            <div class="flex flex-col flex-1">
                <label class="mb-1 text-black text-left"> Tanggal Awal </label>
                <input type="date" placeholder="Input Username" name="username" value="{{ old('username') }}"
                    class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none text-black">
            </div>
            <div class="flex flex-col flex-1">
                <label class="mb-1 text-black text-left"> Tanggal Akhir </label>
                <input type="date" placeholder="Input Username" name="username" value="{{ old('username') }}"
                    class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none text-black">
            </div>
        </div>
        <div class="flex justify-end w-full gap-3">
            <button class="bg-success focus:outline-none text-white rounded-md py-2 w-32">
                Export Excel
            </button>
            <button class="bg-primary focus:outline-none text-white rounded-md py-2 w-32">
                Submit
            </button>
        </div>

    </div>
    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Tabel Line R
        </h1>
        <table class="w-full table-auto rounded-t-2xl">
            <thead class="rounded-t-2xl">
                <tr class="text-white text-sm leading-normal bg-primary">
                    <th class="py-3 px-6 text-center">Tanggal</th>
                    <th class="py-3 px-6 text-center">Waktu</th>
                    <th class="py-3 px-6 text-center">Tegangan (V)</th>
                    <th class="py-3 px-6 text-center">Arus (A)</th>
                    <th class="py-3 px-6 text-center">Daya Nyata (W)</th>
                    <th class="py-3 px-6 text-center">Daya Semu (VA)</th>
                    <th class="py-3 px-6 text-center">Power Factor</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($line_r as $r)
                <?php 
                        $date = explode(' ',$r->created_at);
                    ;?>
                <tr class="bg-gray-50">
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{$date[0]}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{$date[1]}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $r->voltage_r}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $r->current_r}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $r->power_r}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $r->apparent_power_r}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $r->power_factor_r}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer px-3 pb-3">
            {{$line_r->appends(['line_s' => $line_s->currentPage(), 'line_t' => $line_t->currentPage()])->links()}}
        </div>
    </div>

    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Tabel Line S
        </h1>
        <table class="w-full table-auto rounded-t-2xl">
            <thead class="rounded-t-2xl">
                <tr class="text-white text-sm leading-normal bg-primary">
                    <th class="py-3 px-6 text-center">Tanggal</th>
                    <th class="py-3 px-6 text-center">Waktu</th>
                    <th class="py-3 px-6 text-center">Tegangan (V)</th>
                    <th class="py-3 px-6 text-center">Arus (A)</th>
                    <th class="py-3 px-6 text-center">Daya Nyata (W)</th>
                    <th class="py-3 px-6 text-center">Daya Semu (VA)</th>
                    <th class="py-3 px-6 text-center">Power Factor</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($line_s as $s)
                <?php 
                        $date = explode(' ',$s->created_at);
                    ;?>
                <tr class="bg-gray-50">
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{$date[0]}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{$date[1]}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $s->voltage_s}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $s->current_s}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $s->power_s}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $s->apparent_power_s}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $s->power_factor_s}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer px-3 pb-3">
            {{$line_s->appends(['line_r' => $line_r->currentPage(), 'line_t' => $line_t->currentPage()])->links()}}
        </div>
    </div>

    <div
        class="container-table flex flex-col gap-3 rounded rounded-md shadow-lg pt-3 border border-gray-200 overflow-x-auto">
        <h1 class="text-2xl font-semibold text-black px-3">
            Tabel Line T
        </h1>
        <table class="w-full table-auto rounded-t-2xl">
            <thead class="rounded-t-2xl">
                <tr class="text-white text-sm leading-normal bg-primary">
                    <th class="py-3 px-6 text-center">Tanggal</th>
                    <th class="py-3 px-6 text-center">Waktu</th>
                    <th class="py-3 px-6 text-center">Tegangan (V)</th>
                    <th class="py-3 px-6 text-center">Arus (A)</th>
                    <th class="py-3 px-6 text-center">Daya Nyata (W)</th>
                    <th class="py-3 px-6 text-center">Daya Semu (VA)</th>
                    <th class="py-3 px-6 text-center">Power Factor</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($line_t as $t)
                <?php 
                        $date = explode(' ',$t->created_at);
                    ;?>
                <tr class="bg-gray-50">
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{$date[0]}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{$date[1]}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $t->voltage_t}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $t->current_t}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $t->power_t}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $t->apparent_power_t}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-sm">{{
                            $t->power_factor_t}}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer px-3 pb-3">
            {{$line_t->appends(['line_r' => $line_r->currentPage(), 'line_s' => $line_s->currentPage()])->links()}}
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
       $('#datetimepicker').datetimepicker();
    });
</script>
@endsection