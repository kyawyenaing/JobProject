@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Create Job</h4></div>
                <div class="x_content"><br />
                    <span class="text-success">
                      @if(session('message'))
                      <span class="text-success"><h4>{{session('message')}}</h4></span>
                      @endif
                    </span>
                    <form action="{{url('') }}/admin/job" class="form-horizontal col-md-6" method="post">
                        {{csrf_field()}}
                        <div class="form-group unicode">
                            <label for="Name(English)" class="control-label col-md-4 col-sm-4 col-xs-12">Job Title:</label>
                             <div class="col-md-8 col-sm-8 col-xs-12">
                                 <input type="text" name="title" class="form-control col-md-7" value="{{old('title')}}">
                                 <div class="text-danger">{{$errors->first('title')}}</div>
                             </div>
                        </div>
                        <div class="form-group unicode">
                          <label for="Category" class="control-label col-md-4 col-sm-4 col-xs-12">Categroy :</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <select name="category_id" class="form-control" >
                              @foreach($categories as $cat)
                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                              @endforeach
                            </select>
                            <div class="text-danger">{{ $errors->first('category') }}</div>
                          </div>
                        </div>
                        <div class="form-group unicode">
                          <label for="Category" class="control-label col-md-4 col-sm-4 col-xs-12">Job Type :</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <select name="type_id" class="form-control" >
                              @foreach($types as $type)
                              <option value="{{$type->id}}">{{$type->type}}</option>
                              @endforeach
                            </select>
                            <div class="text-danger">{{ $errors->first('type') }}</div>
                          </div>
                        </div>
                        <div class="form-group unicode">
                          <label for="Category" class="control-label col-md-4 col-sm-4 col-xs-12">Company :</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <select name="company_id" class="form-control" >
                              @foreach($companies as $company)
                              <option value="{{$company->id}}">{{$company->name}}</option>
                              @endforeach
                            </select>
                            <div class="text-danger">{{ $errors->first('company') }}</div>
                          </div>
                        </div>
                        <div class="form-group unicode">
                          <label for="Category" class="control-label col-md-4 col-sm-4 col-xs-12">Salary :</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <select name="salary_id" class="form-control" >
                              @foreach($salaries as $salary)
                              <option value="{{$salary->id}}">{{$salary->name}}</option>
                              @endforeach
                            </select>
                            <div class="text-danger">{{ $errors->first('salary') }}</div>
                          </div>
                        </div>
                        <div class="form-group unicode">
                          <label for="Category" class="control-label col-md-4 col-sm-4 col-xs-12">City :</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <select name="city_id" class="form-control" >
                              @foreach($cities as $city)
                              <option value="{{$city->id}}">{{$city->name}}</option>
                              @endforeach
                            </select>
                            <div class="text-danger">{{ $errors->first('city') }}</div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="desc" class="control-label col-md-3 col-xs-12 col-sm-4">Description :</label>
                          <div class="col-md-9 col-sm-8 col-xs-12">
                            <textarea name="desc" id="" class="form-control">{{old('desc')}}</textarea>
                            <div class="text-danger">{{$errors->first('desc')}}</div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="desc" class="control-label col-md-3 col-xs-12 col-sm-4">Requirement :</label>
                          <div class="col-md-9 col-sm-8 col-xs-12">
                            <textarea name="req" id="" class="form-control">{{old('req')}}</textarea>
                            <div class="text-danger">{{$errors->first('req')}}</div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="apply" class="control-label col-md-3 col-xs-12 col-sm-4">How To Apply :</label>
                          <div class="col-md-9 col-sm-8 col-xs-12">
                            <textarea name="apply" id="" class="form-control">{{old('apply')}}</textarea>
                            <div class="text-danger">{{$errors->first('apply')}}</div>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-md-offset-4">
                                 <button class="btn btn-info"><span class="glyphicon glyphicon-save"></span>Save</button>
                                <a href="{{url('')}}/admin/city" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<span>Back</span></a>
                             </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
