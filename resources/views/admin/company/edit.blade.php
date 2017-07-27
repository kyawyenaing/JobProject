@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">
            <div class="x_title">
                <h4>Edit Companies</h4>
            </div>
            <div class="x_content">
            <br/>
            <span class="text-success">
              @if(session('message'))
              <span class="text-success"><h4>{{session('message')}}</h4></span>
              @endif
            </span>
                <form action="{{url('')}}/admin/company/{{$company->id}}" class="form-horizontal col-md-9" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <!-- <input type="hidden" name="user_id" value="1">
                    <input type="hidden" name="name" value="{{$company->name}}">
                    <input type="hidden" name="email" value="{{$company->email}}"> -->

                    @if(Session::has('alert-warning'))
                    <p class="alert alert-warning col-md-8 col-md-offset-4">
                        <i class="glyphicon glyphicon-remove"></i>
                        {{Session::get('alert-warning')}}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                    @endif

                    <div class="form-group">
                        <label for="image" class="control-label col-md-4 col-xs-12">လုိဂုိ　တင္ရန္ :</label>
                        <div class="col-md-8 col-xs-12">
                            <img src="{{url('')}}/{{$company->image->slug}}/{{$company->image->name}}" class="img-responsive">
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <div class="text-danger">{{$errors->first('image')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user" class="control-label col-md-4 col-xs-12">အသုံးျပဳသူ၏　အီးေမးလ္ :</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="email" name="email" class="form-control" value="{{$company->email}}">
                            <input type="hidden" name="user_id" value="{{$company->name}}">
                            <div class="text-danger">{{$errors->first('name')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-4 col-xs-12">လုပ္ငန္း　အမည္ :</label>
                        <div class="col-md-8 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <a id="popoverOption" href="#" data-content="လူၾကီးမင္း၏　လုပ္ငန္းအမည္ကုိ　ထည့္ပါ။ဥပမာ　-　BaganHub Co., Ltd." rel="popover" data-placement="right">&nbsp;<span class="glyphicon glyphicon-question-sign"></span>&nbsp;</a>
                                </span>
                                <input type="text" name="name" class="form-control" aria-describedby="basic-addon1" value="{{$company->name}}" placeholder="Example - Example Co., Ltd.">
                            </div>
                            <div class="text-danger">{{$errors->first('name')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website" class="control-label col-md-4 col-xs-12">website :</label>
                        <div class="col-md-8 col-xs-12">
                            <small>website ရွိပါက　ဤေနရာတြင္　ထည့္ႏုိင္သည္။</small>
                            <input type="text" name="website" class="form-control" value="{{$company->website}}" placeholder="www.baganmart.com">
                            <div class="text-danger">{{$errors->first('website')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="control-label col-md-4 col-xs-12">ဖုန္းနံပါတ္ :</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="text" name="phone" class="form-control" value="{{$company->phone}}" required>
                            <div class="text-danger">{{$errors->first('phone')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label col-md-4 col-xs-12">လိပ္စာ :</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="text" name="address" class="form-control" value="{{$company->address}}" required>
                            <div class="text-danger">{{$errors->first('address')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city_name" class="control-label col-md-4 col-sm-4 col-xs-12">ျမိဳ႕/ျမိဳ႕နယ္ :</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <select name="city_id" id="city" class="form-control">
                                <option>ေရြးခ်ယ္ပါ</option>
                                @foreach($cities as $city)
                                     @if($city->id === $company->city_id)
                                    <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                    @else
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="text-danger">{{$errors->first('city')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category name" class="control-label col-md-4 col-xs-12">လုပ္ငန္း　အမ်ိဳးအစား :</label>
                        <div class="col-md-8 col-xs-12">
                            <select name="category_id" id="category" class="form-control" required>
                                <option>ေရြးခ်ယ္ပါ</option>
                                @foreach($categories as $category)
                                    @if($company->category_id == $category->id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="text-danger">{{$errors->first('category')}}</div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="desc" class="control-label col-md-4 col-xs-12">လုပ္ငန္း　အေၾကာင္း :</label>
                        <div class="col-md-8 col-xs-12">
                            <small>လူၾကီးမင္း၏လုပ္ငန္းအေၾကာင္းကုိ　အေသးစိတ္ေဖာ္ျပႏုိင္သည္။</small>
                            <textarea id="summernote" name="desc" required>{{$company->desc}}</textarea>
                            <div class="text-danger">{{$errors->first('desc')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="revenue" class="control-label col-md-4 col-xs-12">လုပ္ငန္း　၀င္ေငြ :</label>
                        <div class="col-md-8 col-xs-12">
                            <small>(လူၾကီးမင္း　လုပ္ငန္း၏　တစ္ႏွစ္တာ၀င္ေငြကုိ　ေဖာ္ျပႏုိင္သည္။ မထည့္လဲရသည္။)</small><br/>
                            <select name="revenue" class="form-control">
                                <option>ေရြးခ်ယ္ပါ</option>
                                @if($company->revenue)
                                <option value="{{$company->revenue}}" selected>{{$company->revenue}}</option>
                                @endif
                                <option value="Bellow 1 million">Bellow 1 million</option>
                                <option value="1 To 5 million">1 To 5 million</option>
                                <option value="5 To 10 million">5 To 10 million</option>
                                <option value="10 To 20 million">10 To 20 million</option>
                                <option value="Above 30 million">Above 20 million</option>
                            </select>
                            <div class="text-danger">{{$errors->first('revenue')}}</div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="staff" class="control-label col-md-4 col-xs-12">၀န္ထမ္း　အေရအတြက္ :</label>
                        <div class="col-md-8 col-xs-12">
                            <small>optional ( မထည့္လဲရသည္။ )</small>
                            <select name="staff" class="form-control">
                                <option>ေရြးခ်ယ္ပါ</option>
                                @if($company->staff)
                                <option value="{{$company->staff}}" selected>{{$company->staff}}</option>
                                @endif
                                <option value="1 to 10">1 to 10</option>
                                <option value="11 to 50">11 to 50</option>
                                <option value="51 to 200">51 to 200</option>
                                <option value="201 to 500">201 to 500</option>
                                <option value="501 to 1000">501 to 1000</option>
                                <option value="1001 to 5000">1001 to 5000</option>
                                <option value="5001 to 10000">5001 to 10000</option>
                                <option value="10001 +">10001 +</option>
                            </select>
                            <div class="text-danger">{{$errors->first('staff')}}</div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="staff" class="control-label col-md-4 col-xs-12">၀န္ထမ္း　အေရအတြက္ :</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="text" name="staff" class="form-control" value="{{$company->staff}}">
                            <div class="text-danger">{{$errors->first('staff')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="establish" class="control-label col-md-4 col-xs-12">လုပ္ငန္း　တည္ေထာင္ေသာႏွစ္ :</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="text" name="establish" class="form-control" value="{{$company->establish}}" id="datepicker">
                            <div class="text-danger">{{$errors->first('establish')}}</div>
                        </div>
                    </div>                    
                    <!-- <div class="form-group">
                        <label for="youtube" class="control-label col-md-4 col-xs-12">youtube :</label>
                        <div class="col-md-8 col-xs-12">
                            <small>(လူၾကီးမင္း၏　လုပ္ငန္းအေၾကာင္းvideo ကုိ youtube ေပၚတြင္ရွိပါကထည့္သြင္းႏုိင္သည္။)</small>
                            <input type="text" name="youtube" class="form-control" value="{{$company->youtube}}" placeholder="Example - https://www.youtube.com/watch?v=jyZhnbZpk4U">
                            <div class="text-danger">{{$errors->first('youtube')}}</div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;Save
                            </button>
                            <a href="{{url('')}}/admin/company" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<span>Back</span></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection




