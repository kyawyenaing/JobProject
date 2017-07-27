@extends('layouts.admin')
@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">

        <div class="x_title"><h4>Show All Companies</h4></div>

        <div class="x_content">
          <span class="pull-left text-success">
            @if(session('message'))
            {{session('message')}}
            @endif
          </span>
          @if($companies->isEmpty())
          <span class="text-center text-danger"><h4>အခ်က္အလက္မ်ား ထည့္သြင္းထားျခင္း မရွိေသးပါ။</h4></span>
          @endif
          <span class="pull-right">{{$companies->links()}}</span>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Category</th>
                    <th>City</th>
                    <th>Image</th>
                    <th colspan="2">Option</th>
                </tr>

                @foreach($companies as $company)
                <tr>
                    <td><strong>{{$company->id}}</strong></td>
                    <td><strong>{{$company->name}}</strong></td>
                    <td><strong>{{$company->category->name}}</strong></td>
                    <td><strong>{{$company->city->name_mm}}</strong></td>
                    <td>
                        <img src="{{url('')}}/{{$company->image->slug}}/{{$company->image->name}}" width="70" height="70">
                    </td>
                    <td>
                        <a href="{{url('')}}/admin/company/{{$company->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>

                        <form action="{{url('')}}/admin/companys/{{$company->id}}" method="post" class="form-delete">
                            <input type="hidden" name="_method" value="DELETE">
                              {{csrf_field()}}
                            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="pagination">
        {{$companies->links()}}
    </div>
</div>


<a href="{{url('')}}/admin/company/create" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Create Company</a>

@endsection


