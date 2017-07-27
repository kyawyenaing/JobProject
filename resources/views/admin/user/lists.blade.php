@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">

				<table class="table">
					<tr>
						<th></th>
						<th>Name</th>
						<th>Role</th>
						<th>Option</th>
					</tr>
					@foreach($users as $u)
					<tr>
						<td></td>
						<td>{{$u->name}}</td>
						<td></td>
						<td>
							<a href="{{url('')}}/admin/users/{{$u->id}}edit/" class="btn btn-info">Edit</a>							
						</td>
					</tr>
					@endforeach
				</table>

		</div>
	</div>

	<div class="row">
		<div class="col-md-12">

			{{$users->links()}}

		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="{{url('')}}/admin/users/create"  class="btn btn-success">Create New</a>
		</div>
	</div>
</div>
@endsection
