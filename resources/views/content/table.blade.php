@extends('../layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1> <br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('/filter') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="mb-1">Tanggal Awal</div>
                        <input type="text" class="" name="start_date" id="start_date" autocomplete="off">
                    </div>
                    <script>
                        $('#start_date').datepicker({
                        format: 'yyyy-mm-dd',
                        uiLibrary: 'bootstrap4'
                    });
                    </script>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="mb-1">Tanggal Akhir</div>
                        <input type="text" class="" name="end_date" id="end_date" autocomplete="off">
                    </div>
                    <script>
                        $('#end_date').datepicker({
                            format: 'yyyy-mm-dd',
                        uiLibrary: 'bootstrap4'
                    });
                    </script>
                </div>
                <input type="submit" class="btn btn-primary mt-3" style="float:right" value="Submit">
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Power Quality Line R</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="lineS" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Tegangan</th>
                                        <th>Arus</th>
                                        <th>Real Power</th>
                                        <th>Apparent Power</th>
                                        <th>Power Factor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($sensor as $data)
                                    <?php 
                                        $no++;
                                        $date = explode(' ',$data->created_at);
                                    ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $date[0]}}</td>
                                        <td>{{ $date[1]}}</td>
                                        <td>{{ $data->voltage_r}}</td>
                                        <td>{{ $data->current_r}}</td>
                                        <td>{{ $data->power_r}}</td>
                                        <td>{{ $data->apparent_power_r}}</td>
                                        <td>{{ $data->power_factor_r}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Power Quality Line S</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="lineS" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Tegangan</th>
                                        <th>Arus</th>
                                        <th>Real Power</th>
                                        <th>Apparent Power</th>
                                        <th>Power Factor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($sensor as $data)
                                    <?php 
                                        $no++;
                                        $date = explode(' ',$data->created_at);
                                    ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $date[0]}}</td>
                                        <td>{{ $date[1]}}</td>
                                        <td>{{ $data->voltage_s}}</td>
                                        <td>{{ $data->current_s}}</td>
                                        <td>{{ $data->power_s}}</td>
                                        <td>{{ $data->apparent_power_s}}</td>
                                        <td>{{ $data->power_factor_s}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Power Quality Line T</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="lineT" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Tegangan</th>
                                        <th>Arus</th>
                                        <th>Real Power</th>
                                        <th>Apparent Power</th>
                                        <th>Power Factor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($sensor as $data)
                                    <?php 
                                        $no++;
                                        $date = explode(' ',$data->created_at);
                                    ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $date[0]}}</td>
                                        <td>{{ $date[1]}}</td>
                                        <td>{{ $data->voltage_t}}</td>
                                        <td>{{ $data->current_t}}</td>
                                        <td>{{ $data->power_t}}</td>
                                        <td>{{ $data->apparent_power_t}}</td>
                                        <td>{{ $data->power_factor_t}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection