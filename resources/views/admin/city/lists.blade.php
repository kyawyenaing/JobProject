@extends('layouts.admin')
@section('content')      

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
      <div class="x_title">
        <h4>Show All Cities</h4>
      </div>

      <div class="x_content">
        <br />
            <span class="text-success">
              @if(session('message'))
              <span class="text-success"><h4>{{session('message')}}</h4></span>
              @endif
            </span>
            @if($cities->isEmpty())
            <span class="text-center text-danger"><h4>အခ်က္အလက္မ်ား ထည့္သြင္းထားျခင္း မရွိေသးပါ။</h4></span>
            @endif
            <span class="pull-right">{{$cities->links()}}</span>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>City(Myanar)</th>
                    <th>City(English)</th>
                    <th>Region</th>
                    <th colspan="2">Option</th>
                </tr>
                @foreach($cities as $city)
                <tr>
                  <td>{{$city->id}}</td>
                  <td>{{$city->name_mm}}</td>
                  <td>{{$city->name}}</td>
                  <td>
                    <a href="{{url('')}}/admin/city/{{$city->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
                    <form action="{{url('')}}/admin/city/{{$city->id}}" method="post" class="form-delete">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</button>
                    </form>
                  <td>
                </tr>
                @endforeach
            </table>
            
            <span class="pull-right">{{$cities->links()}}</span>
      </div>
    </div><!-- /end x_panel -->

  </div>
</div>
<a href="{{url('admin/city/create')}}" class="btn btn-success">
  <span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<span>Add New</span>
</a>
@endsection


