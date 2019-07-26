@extends('backpack::layout')

@section('header')
	<section class="content-header">

		<div class="alert alert-danger">
		  <strong><h4>Edit Kuisioner</h4></strong>
		</div>
	  
	  <ol class="breadcrumb">
	    <li><a href="/admin/questionlist">Daftar Kuisioner</a></li>
	    <li><a href="/questionlists/create" class="text-capitalize">Buat Daftar Kuisioner</a></li>
	  </ol>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">

		  <form method="post" action="{{ route('questionlists.update',$questionlist->id) }}">
		  {!! csrf_field() !!}
		  <input type="hidden" name="_method" value="put">
		  <div class="box">

		    
		    <div class="box-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      <div class="col-sm-10">
			      <div class="form-group">
			      	<label for="">Dari Bidang</label>
			      	<select class="form-control" name="field_list_id">
			      		@foreach($fieldlists as $fieldlist)
			      			<option {{ $fieldlist->id == $questionlist->field_list_id ? 'selected' : null }} value="{{ $fieldlist->id }}">{{ $fieldlist->name }}</option>}
			      		@endforeach
			      	</select>
			      </div>
		      </div>

		      <div class="col-sm-10">
			      <div class="form-group">
			      	<label for="">Kuisioner</label>
			      	<input type="text" class="form-control" name="name" placeholder="Kuisioner" value="{{ $questionlist->name }}">
			      </div>
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
