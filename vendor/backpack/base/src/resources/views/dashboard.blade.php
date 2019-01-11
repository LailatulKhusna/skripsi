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
    @foreach($fields as $f => $field)
        <div class="row">
            <div class="col-sm-6">
                <div class="jumbotron">
                    <h1>Bidang {{ $f }}</h1>
                    <chart-performance-component :chartdata="{{ json_encode($field['performance']) }}"></chart-performance-component>

                    <p><h4>Keterangan Grafik :</h4></p>
                    <h5>TP = Tidak Puas</h5>
                    <h5>KP = Kurang Puas</h5>
                    <h5>CP = Cukup Puas</h5>
                    <h5>P =  Puas</h5>
                    <h5>SP = Sangat Puas</h5>
                </div>
            </div>
            <div class="col-sm-6">
                <h1>Hasil CSI</h1>
                <chart-csi-component :csi="{{ $field['csi'] }}"></chart-csi-component>

            </div>
        </div>
    @endforeach
@endsection
