@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h4>Create Companies</h4>
                </div>
                <div class="x_content">
                <span class="text-success">
                  @if(session('message'))
                  <span class="text-success"><h4>{{session('message')}}</h4></span>
                  @endif
                </span>
                    <form action="{{url('') }}/admin/company" class="form-horizontal col-md-8" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="1">
                        <div class="form-group">
                            <label for="Company Name" class="control-label col-md-4 col-sm-4 col-xs-12">Company Name:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="name" class="form-control col-md-7 col-xs-12" value="{{old('name')}}" placeholder="Your Company Name">
                                <div class="text-danger">{{$errors->first('name')}}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Company Website" class="control-label col-md-4 col-sm-4 col-xs-12">Company Website:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="website" class="form-control col-md-7 col-xs-12" value="{{old('website')}}" placeholder="www.yourwebsite.com">
                                <div class="text-danger">{{$errors->first('website')}}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Company Email" class="control-label col-md-4 col-sm-4 col-xs-12">Company Email:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="email" name="email" class="form-control col-md-7 col-xs-12" value="{{old('email')}}" placeholder="example@gmail.com">
                                <div class="text-danger">{{$errors->first('email')}}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Company Website" class="control-label col-md-4 col-sm-4 col-xs-12">Company Phone Number:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="tel" name="phone" class="form-control col-md-7 col-xs-12" value="{{old('phone')}}">
                                <div class="text-danger">{{$errors->first('phone')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
              						<label for="desc" class="control-label col-md-3 col-xs-12 col-sm-4">Address :</label>
              						<div class="col-md-9 col-sm-8 col-xs-12">
              							<textarea name="address" class="form-control">{{old('address')}}</textarea>
              							<div class="text-danger">{{$errors->first('address')}}</div>
              						</div>
              					</div>
                        <div class="form-group">
                            <label for="categories name" class="control-label col-md-4 col-sm-4 col-xs-12">Categories</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option>-- ေရြးခ်ယ္ပါ --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            <div class="text-danger">{{$errors->first('category_id')}}</div>
                            </div>
                        </div>

                        <div class="form-group">
                           <label for="city name" class="control-label col-md-4 col-sm-4 col-xs-12">City</label>
                           <div class="col-md-8 col-sm-8 col-xs-12">
                                <select name="city_id" id="city_id" class="form-control">
                                    <option>-- ေရြးခ်ယ္ပါ --</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">{{$errors->first('city_id')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Upload Image" class="control-label col-md-4 col-sm col-xs-12">Upload Image :</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="file" name="image" id="image" >
                                <div class="text-danger">{{$errors->first('image')}}</div>
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
                            <label for="Number of Staff" class="control-label col-md-4 col-sm-4 col-xs-12">Number of Staff:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="number" name="staff" class="form-control col-md-7 col-xs-12" value="{{old('staff')}}">
                                <div class="text-danger">{{$errors->first('staff')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Established Year" class="control-label col-md-4 col-sm-4 col-xs-12">Established Year:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="datetime" name="establish" class="form-control col-md-7 col-xs-12" value="{{old('establish')}}" id="datepicker">
                                <div class="text-danger">{{$errors->first('establish')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-md-offset-4">
                                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Save</button>
                                <a href="{{url('')}}/admin/company" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<span>Back</span></a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
