@extends('layouts/admin')

@section('content')

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h4>All Categories</h4>
			</div>
			<div class="x_content">
				<br/>

				<form action="{{url('')}}/admin/category" method="post" class="form-horizontal col-md-8">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="parent" value="0">

					<div class="form-group">
						<label for="Name" class="control-label col-md-3 col-xs-12 col-sm-4">Name :</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<input type="text" name="name" class="form-control" value="{{old('name')}}">
							@if($errors->first('name'))
							<div class="text-danger">
							<!-- {{$errors->first('name')}} -->
							error
							</div>
							@endif
						</div>
					</div>

					<div class="form-group unicode">
						<label for="name_mm" class="control-label col-md-3 col-xs-12 col-sm-4">Name Myanmar :</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<input type="text" name="name_mm" class="form-control" value="{{old('name_mm')}}" id="name_mm">
							<div class="text-danger">{{$errors->first('name_mm')}}</div>
						</div>
					</div>

					<div class="form-group">
						<label for="desc" class="control-label col-md-3 col-xs-12 col-sm-4">Description :</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<textarea name="desc" id="summernote" class="form-control">{{old('desc')}}</textarea>
							<div class="text-danger">{{$errors->first('desc')}}</div>
						</div>
					</div>

					<div class="form-group">
			            <div class="col-sm-9 col-md-offset-3">
			                <button class="btn btn-info"><span class="glyphicon glyphicon-save"></span>&nbsp;<span>Save</span></button>
			                <a href="{{url('admin/category')}}" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<span>Back</span></a>
			            </div>
		            </div>

				</form>

			</div>
		</div>
	</div>
</div>

@endsection
