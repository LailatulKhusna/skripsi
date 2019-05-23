@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <button onclick="printthis()" type="button" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print</button><hr>

    {{-- table --}}
    <h3>Tabel Kepentingan</h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Soal</td>
                <td>Kepentingan</td>
                <td>Total</td>
                <td>Average</td>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($table[0]) }} --}}
            @foreach($table['importance'] as $r => $row)
            <tr>
                <td>{{ $r+1 }}</td>
                <td>A{{ $r+1 }}</td>
                <td>
                    @foreach ($row['value'] as $v => $val)
                        {{-- expr --}}
                        {{ $v != 0 ? ',':null }}{{ $val }}
                    @endforeach
                </td>
                <td>{{ $row['total'] }}</td>
                <td>{{ $row['average'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Tabel Kinerja</h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Soal</td>
                <td>Kinerja</td>
                <td>Total</td>
                <td>Average</td>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($table[0]) }} --}}
           @foreach($table['performance'] as $r => $row)
            <tr>
                <td>{{ $r+1 }}</td>
                <td>A{{ $r+1 }}</td>
                <td>
                    @foreach ($row['value'] as $v => $val)
                        {{-- expr --}}
                        {{ $v != 0 ? ',':null }}{{ $val }}
                    @endforeach
                </td>
                <td>{{ $row['total'] }}</td>
                <td>{{ $row['average'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-striped table-bordered"> 
        <thead> 
            <tr> 
                <td>No.</td>
                <td>Soal</td>
                <td>Kepentingan</td>
                <td>Kinerja</td>
                <td>Kepentingan x Kinerja</td>
            </tr>
        </thead>
        <tbody> 
            @foreach ($table['merge']['value'] as $r => $row)
                {{-- expr --}}
                <tr> 
                    <td>{{ $r+1 }}</td>
                    <td>A{{ $r+1 }}</td>
                    <td>{{ $row['importance'] }}</td>
                    <td>{{ $row['performance'] }}</td>
                    <td>{{ $row['ixp'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="print-this">
        @foreach($fields as $f => $field)
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3>Laporan Kepuasan Pelanggan AHASS Handayani</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 container">

                            <h3>Bidang {{ $f }}</h3>
                            <chart-performance-component id="canvas" :chartdata="{{ json_encode($field['performance']) }}"></chart-performance-component>

                            <br>
                            <p><h4>Keterangan Grafik :</h4></p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>TP = Tidak Puas</h5>
                                    <h5>KP = Kurang Puas</h5>
                                    <h5>CP = Cukup Puas</h5>
                                </div>
                                <div class="col-sm-6">
                                    <h5>P =  Puas</h5>
                                    <h5>SP = Sangat Puas</h5>
                                </div>
                            </div>
                    </div>
                </div>  
            </div>
        </div>
        @endforeach    
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3>Hasil CSI</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 container">
                        <h3>Hasil CSI</h3>
                        <br>
                        <chart-csi-component :csi="{{ number_format($table['csi'],2,'.','') }}"></chart-csi-component>

                        <br> 
                        <br> 
                        <br> 
                        <br>   
                        <p><h4>Keterangan Grafik :</h4></p>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>TP = Tidak Puas</h5>
                                <h5>KP = Kurang Puas</h5>
                                <h5>CP = Cukup Puas</h5>
                            </div>
                            <div class="col-sm-6">
                                <h5>P =  Puas</h5>
                                <h5>SP = Sangat Puas</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('before_scripts')
<script type="text/javascript">
    function printthis(){
        $('#print-this').printThis({
            importCSS:true,
            importStyle:true,
            canvas:true
        });
    }
</script>
@endsection
