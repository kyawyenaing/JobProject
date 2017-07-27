@extends('layouts/admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h4>Edit Category</h4>
			</div>
			<div class="x_content">
				<br/>
				<form action="{{url('')}}/admin/category/{{$category->id}}" class="form-horizontal col-md-8" method="post">

					<input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}

					<div class="form-group">
						<label for="Title" class="control-label col-md-3 col-sm-4 col-xs-12">Title</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<input type="text" name="name" value="{{$category->name}}" class="form-control">
							<div class="text-danger">{{$errors->first('name')}}</div>
						</div>
					</div>

					<div class="form-group unicode">
						<label for="name_mm" class="control-label col-md-3 col-xs-12 col-sm-4">Title Myanmar :</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<input type="text" name="name_mm" class="form-control" value="{{$category->name_mm}}" id="name_mm">
							<div class="text-danger">{{$errors->first('name_mm')}}</div>
						</div>
					</div>
					<div class="form-group">
						<label for="desc" class="control-label col-md-3 col-xs-12 col-sm-4">Description :</label>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<textarea name="desc" id="summernote" class="form-control">{{$category->desc}}</textarea>
							<div class="text-danger">{{$errors->first('desc')}}</div>
						</div>
					</div>
					<div class="form-group">
			            <div class="col-sm-9 col-md-offset-3">
			                <button class="btn btn-info"><span class="glyphicon glyphicon-save"></span>&nbsp;<span>Save</span></button>
			                <a href="{{ url('/admin/category') }}" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<span>Back</span></a>
			            </div>
		            </div>

				</form>

			</div>
		</div>
	</div>
</div>

@endsection
