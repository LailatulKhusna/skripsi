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
    <div id="print-this">
    @foreach($fields as $f => $field)
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3>Laporan Kepuasan Pelanggan AHASS Handayani</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 container">

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
                <div class="col-sm-6">
                    <h3>Hasil CSI</h3>
                    <br>
                    <chart-csi-component :csi="{{ $field['csi'] }}"></chart-csi-component>

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
    @endforeach    
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
