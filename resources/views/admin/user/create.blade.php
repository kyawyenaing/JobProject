<!-- KYN -->
@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!--{{url('')}}/admin/currency/store mean CurrencyController@store -->
	<form method="post" action="{{url('')}}/admin/users" >
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
						<label class="form-label">Name &nbsp;</label>
						<input type="text" class="form-input" name="name">
					</div>

					<div class="form-group">
						<label class="form-label">Email&nbsp;</label>
						<input type="text" class="form-input" name="email">
					</div>

					<div class="form-group">
						<label class="form-label">Password</label>
						<input type="text" class="form-input" name="password">
					</div>

					<div class="form-group">
						<label class="form-label">Role</label>
						@foreach($roles as $r)
							<input type="checkbox" class="form-inline" value="{{$r->id}}" @if($r->id == '3' | $r->id == '4' ) checked='checked' @endif name="role[]">{{$r->display_name}}
						@endforeach
					</div>

					<div class="form-group">
						<label class="form-label"></label>
						<input type="submit" class="btn btn-success" value="Add new User">
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection
