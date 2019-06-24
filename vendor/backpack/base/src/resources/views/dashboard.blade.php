@extends('backpack::layout')

@section('after_styles')
<style type="text/css">
    .table thead td{
        font-weight: bold;
    }
</style>
@endsection

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
    <div class="alert alert-danger">
        <strong><h4>Tabel Poin Kepentingan Kuisioner</h4></strong>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Kuisioner</td>
                <td>Poin Kepentingan</td>
                <td>Total</td>
                <td>Rata-rata</td>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($table[0]) }} --}}
            @if(isset($table['importance']))
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
            @endif
        </tbody>
    </table>

    <div class="alert alert-danger">
        <strong><h4>Tabel Poin Kinerja Kuisioner</h4></strong>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Kuisioner</td>
                <td>Poin Kinerja</td>
                <td>Total</td>
                <td>Rata-rata</td>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($table[0]) }} --}}
            @if(isset($table['performance']))
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
            @endif
        </tbody>
    </table>

    <table class="table table-striped table-bordered"> 
        <thead> 
            <tr> 
                <td>No.</td>
                <td>Soal</td>
                <td>Rata-rata Poin Kepentingan</td>
                <td>Rata-rata Poin Kinerja</td>
                <td>Rata-rata Kepentingan x Rata-rata Kinerja</td>
            </tr>
        </thead>
        <tbody> 
            @if(isset($table['merge']))
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
            @endif
        </tbody>
    </table>
    <br>
    <br>

    <div id="print-this">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3>Laporan Kepuasan Pelanggan AHASS Handayani</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    @foreach($fields as $f => $field)
                    <div class="col-sm-6 container" style="padding-bottom: 50px;">
                            <div class="alert alert-danger">
                                <strong><h4>Bidang {{ $f }}</h4></strong>
                            </div>
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
                    @endforeach


                </div>  
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3>Hasil Survei</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 container">
                        <div class="alert alert-success">
                            <strong><h3>Hasil Survei Kepuasan Pelanggan Berdasarkan Perhitungan CSI</h3></strong>
                        </div>
                        <br>
                        <chart-csi-component :csi="{{ number_format($table['csi'] ?? 0,2,'.','') }}"></chart-csi-component>

                        <br> 
                        <br> 
                        <br> 
                        <br>   
                        
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <p><h4>Keterangan Grafik :</h4></p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nilai CSI</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="success">
                                            <td>1</td>
                                            <td>81%-100%</td>
                                            <td>Sangat Puas</td>
                                        </tr>
                                        <tr class="info">
                                            <td>2</td>
                                            <td>66%-80%</td>
                                            <td>Puas</td>
                                        </tr>
                                        <tr class="active">
                                            <td>3</td>
                                            <td>51%-65%</td>
                                            <td>Cukup Puas</td>
                                        </tr>
                                        <tr class="warning">
                                            <td>4</td>
                                            <td>35%-50%</td>
                                            <td>Kurang Puas</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>5</td>
                                            <td>0%-34%</td>
                                            <td>Tidak Puas</td>
                                        </tr>
                                    </tbody>
                                </table>
                             </div>
                             <div class="col-sm-4"></div>
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
