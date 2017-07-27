@extends('layouts.admin')
@section('content')      

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
      <div class="x_title">
        <h4>Show All type Ranges</h4>
      </div>

      <div class="x_content">
        <br />
            <span class="text-success">
              @if(session('message'))
              <span class="text-success"><h4>{{session('message')}}</h4></span>
              @endif
            </span>
            @if($types->isEmpty())
            <span class="text-center text-danger"><h4>အခ်က္အလက္မ်ား ထည့္သြင္းထားျခင္း မရွိေသးပါ။</h4></span>
            @endif
            <span class="pull-right">{{$types->links()}}</span>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th colspan="2">Option</th>
                </tr>
                @foreach($types as $type)
                <tr>
                  <td>{{$type->id}}</td>
                  <td>{{$type->type}}</td>
                  <td>
                    <a href="{{url('')}}/admin/type/{{$type->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
                    <form action="{{url('')}}/admin/type/{{$type->id}}" method="post" class="form-delete">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</button>
                    </form>
                  <td>
                </tr>
                @endforeach
            </table>
            
            <span class="pull-right">{{$types->links()}}</span>
      </div>
    </div><!-- /end x_panel -->

  </div>
</div>
<a href="{{url('admin/type/create')}}" class="btn btn-success">
  <span class="glyphicon glyphicon-plus-sign"></span>&nbsp;<span>Add New</span>
</a>
@endsection


