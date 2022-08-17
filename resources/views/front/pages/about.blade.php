@extends('layouts.app',['page_title'=>__('lang.about us')])
@section('content')
<div class="col-12 p-0">
	<div class=" p-0 container">
		<div class="col-12 p-2 p-lg-3 row">
			<div class="col-12 px-2 pt-5 pb-3">
			    <div class="col-12 p-0 font-4">
			        <span class="start-head"></span> {{ __('lang.about us') }}
			    </div>

			</div>
			<div class="col-12 col-lg-8 p-2">
                @if ($about != null)
                    {!! $about->description !!}
                @endif
			</div>
		</div>
	</div>
</div>
@endsection
