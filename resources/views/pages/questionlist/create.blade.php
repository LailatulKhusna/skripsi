@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
        <span class="text-capitalize">Tambah Daftar Kuisioner</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="/admin/questionlist">Daftar Kuisioner</a></li>
	    <li><a href="/questionlists/create" class="text-capitalize">Buat Daftar Kuisioner</a></li>
	  </ol>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">

		  <form method="post" action="{{ route('questionlists.store') }}">
		  {!! csrf_field() !!}
		  <div class="box">

		    <div class="box-header with-border">
		      <h3 class="box-title">Tambah Baru</h3>
		    </div>
		    <div class="box-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      <div class="form-group">
		      	<label for="">Dari Bidang</label>
		      	<select class="form-control" name="field_list_id">
		      		@foreach($fieldlists as $fieldlist)
		      			<option value="{{ $fieldlist->id }}">{{ $fieldlist->name }}</option>}
		      		@endforeach
		      	</select>
		      </div>
		      <div class="form-group">
		      	<label for="">Kuisioner</label>
		      	<input type="text" class="form-control" name="name" placeholder="Kuisioner">
		      </div>
		    </div><!-- /.box-body -->
		    <div class="box-footer">
		    	<button type="submit" class="btn btn-success">Simpan</button>
		    </div><!-- /.box-footer-->

		  </div><!-- /.box -->
		  </form>
	</div>
</div>

@endsection
