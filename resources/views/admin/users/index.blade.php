@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	{{ __('lang.Users') }}
				</div>
				<div class="col-12 col-lg-4 p-2">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('create',\App\Models\User::class)
					<a href="{{route('admin.users.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> {{ __('lang.Add new') }}</span>
					</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="{{ __('lang.search') }} ... ">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">


			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>{{ __('lang.name') }}</th>
						<th>{{ __('lang.email') }}</th>
						<th>{{ __('lang.control') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							@can('view',$user)
							<a href="{{route('admin.users.show',$user)}}">
							<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
								<span class="fas fa-search "></span> {{ __('lang.Show') }}
							</span>
							</a>
							@endif

							@can('update',$user)
							<a href="{{route('admin.users.edit',$user)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> {{ __('lang.Edit') }}
							</span>
							</a>
							@endif
							@can('delete',$user)
							<form method="POST" action="{{route('admin.users.destroy',$user)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm({{ __('lang.are sure of the deleting process ?') }});if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> {{ __('lang.Delete') }}
								</button>
							</form>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$users->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
