@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<form action="{{url('')}}/admin/users/{{$user->id}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

					<p>{{$user->name}}</p>


					<div class="form-group">
						<label class="form-label">Role</label>
						<select name='role_id'>
							@foreach($roles as $r)
							<option

							@if($user->roles[0]->id == $r->id)
								selected='selected'
							@endif

							value="{{$r->id}}">{{$r->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label class="form-label"></label>
						<input type="submit" class="form-input" value="Update Role">
					</div>

			</form>

		</div>
	</div>
</div>
@endsection
