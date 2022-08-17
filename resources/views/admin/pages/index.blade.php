@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-pages"></span> {{ __('lang.Pages') }}
				</div>
				<div class="col-12 col-lg-4 p-2">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('create',\App\Models\Page::class)
					<a href="{{route('admin.pages.create')}}">
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
                            <th>{{ __('lang.User') }}</th>
                            <th>{{ __('lang.Link') }}</th>
                            <th>{{ __('lang.Logo') }}</th>
                            <th>{{ __('lang.address') }}</th>
                            <th>{{ __('lang.control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Start Home Page --}}
                        <tr>
                            <td>#</td>
                            <td>Developer</td>
                            <td>{{ env('APP_URL') }}</td>
                            <td><img src="{{ asset('front-end/img/logo/logo.png')  }}" style="width:40px"></td>
                            <td>{{ __('lang.Home') }}</td>

                            <td style="width: 270px;">


                                <a href="{{url('/')}}">
                                    <span class="btn  btn-outline-primary btn-sm font-1 mx-1">
                                        <span class="fas fa-search "></span> {{ __('lang.Show') }}
                                    </span>
                                </a>



                                <a href="{{ route('admin.editHomePage') }}">
                                    <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                        <span class="fas fa-wrench "></span> {{ __('lang.Edit') }}
                                    </span>
                                </a>

                            </td>
                        </tr>
                        {{-- End Home Page --}}

                        @foreach($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->user->name}}</td>
                            <td>{{$page->slug}}</td>
                            <td><img src="{{$page->image()}}" style="width:40px"></td>
                            <td>{{$page->title}}</td>

                            <td style="width: 270px;">

                                @can('view',$page)
                                <a href="{{route('page.show',['page'=>$page])}}">
                                    <span class="btn  btn-outline-primary btn-sm font-1 mx-1">
                                        <span class="fas fa-search "></span> {{ __('lang.Show') }}
                                    </span>
                                </a>
                                @endif

                                @can('update',$page)
                                <a href="{{route('admin.pages.edit',$page)}}">
                                    <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                        <span class="fas fa-wrench "></span> {{ __('lang.Edit') }}
                                    </span>
                                </a>
                                @endif
                                @can('delete',$page)
                                <form method="POST" action="{{route('admin.pages.destroy',$page)}}" class="d-inline-block">@csrf @method("DELETE")
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
			{{$pages->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
