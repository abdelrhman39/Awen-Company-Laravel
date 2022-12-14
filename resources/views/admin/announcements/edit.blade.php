@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>{{ __('lang.Edit') }}</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('admin.announcements.update',$announcement)}}" enctype="multipart/form-data">
	 			@csrf
	 			@method("PUT")

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
                    {{ __('lang.address') }}
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{old('title',$announcement)}}" required="" min="3" max="255">
	 			</div>
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
                    {{ __('lang.Start Date') }}
	 			</div>
	 			<div class="col-9 px-2" >
	 				<textarea class="form-control" name="description" min="3" max="1000" style="min-height: 200px"  required="">{{old('description',$announcement)}}</textarea>
	 			</div>
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
                    {{ __('lang.Start Date') }}
	 			</div>
	 			<div class="col-9 px-2" >
	 				<input type="datetime-local" name="start_date" value="{{old('start_date',$announcement)}}" class="form-control">
	 			</div>
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
                    {{ __('lang.End Date') }}
	 			</div>
	 			<div class="col-9 px-2" >
	 				<input type="datetime-local" name="end_date" value="{{old('end_date',$announcement)}}" class="form-control">
	 			</div>
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
                    {{ __('lang.Link') }}
	 			</div>
	 			<div class="col-9 px-2" >
	 				<input type="url" name="url" value="{{old('url',$announcement)}}" class="form-control">
	 			</div>
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				{{ __('lang.Open the link in a new window') }}
	 			</div>
	 			<div class="col-9 px-2" >
	 				<div class="form-switch">
					  <input name="open_url_in" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{old('open_url_in',$announcement)=="NEW_WINDOW"?"checked":""}} style="width: 50px;height:25px" value="NEW_WINDOW">
					</div>
	 			</div>
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
                    {{ __('lang.Image') }}
	 			</div>
	 			<div class="col-9 px-2" >
	 				<input type="file" name="image" class="form-control" accept="image/*">
	 				@if($announcement->image!=null)
	 				<div class="col-12 py-2">
	 					<img src="{{$announcement->image()}}" style="width:180px;">
	 				</div>
	 				@endif
	 			</div>
	 		</div>


	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">

	 			</div>
	 			<div class="col-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">{{ __('lang.save') }}</button>
	 			</div>

	 		</div>

	 		</form>

	 	</div>

	 </div>
</div>
@endsection
