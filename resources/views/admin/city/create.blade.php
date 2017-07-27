@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Create City</h4>
                </div>
                <div class="x_content">
                <br />
                    <form action="{{url('') }}/admin/city" class="form-horizontal col-md-6" method="post">
                        {{csrf_field()}}
                        <div class="form-group unicode">
                            <label for="Name(English)" class="control-label col-md-4 col-sm-4 col-xs-12">Name(English):</label>
                             <div class="col-md-8 col-sm-8 col-xs-12">
                                 <input type="text" name="name" class="form-control col-md-7" value="{{old('name')}}">
                                 <div class="text-danger">{{$errors->first('name')}}</div>
                             </div>
                        </div>

                        <div class="form-group unicode">
                            <label for="Name(Myanmar)" class="control-label col-md-4 col-sm-4 col-xs-12">Name(Myanmar):</label>
                             <div class="col-md-8 col-sm-8 col-xs-12">
                                 <input type="text" name="name_mm" class="form-control col-md-7 col-xs-12" value="{{old('name_mm')}}" placeholder="ယူနီကုတ်ဖြင့် ထည့်သွင်းပါ...">
                                 <div class="text-danger">{{$errors->first('name_mm')}}</div>
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
