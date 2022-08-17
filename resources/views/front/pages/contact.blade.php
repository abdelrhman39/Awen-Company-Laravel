@extends('layouts.app',['page_title'=> __('lang.contact us')])
@section('content')
<div class="col-12 p-0">
    <div class=" p-0 container">
        <div class="col-12 p-2 p-lg-3 row">
            <div class="col-12 px-2 pt-5 pb-3">
                <div class="col-12 p-0 font-4">
                    <span class="start-head"></span> {{ __('lang.contact us') }}
                </div>
                {{-- <div class="col-12 p-0 mt-1" style="opacity: .7;">
                    معلومات عنا
                </div> --}}
            </div>
            <div class="col-md-5 p-2 text-center">
                {!!$settings['contact_page']!!}
                <img class="w-100" src="{{ asset('front-end/img/gallery/Get in touch-pana.png') }}"/>
            </div>
            <div class="col-md-7 p-0 ">
                <div style="max-width: 100%;text-align: justify;" class="mx-auto p-0 font-2 naskh">
                    <form class="" method="POST" action="{{route('contact-post')}}" id="contact-form">
                        <input type="hidden" name="recaptcha" id="recaptcha">
                        @csrf
                        <div class="col-12 px-0 py-3">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control rounded-0" placeholder="{{ __('lang.name') }}" required="" min="3" max="255" value="">
                            </div>
                        </div>
                        <div class="col-12 px-0 py-3">
                            <div class="col-12">
                                <input type="email" name="email" class="form-control rounded-0" placeholder="{{ __('lang.email') }}" required="" value="">
                            </div>
                        </div>
                        <div class="col-12 px-0 py-3">
                            <div class="col-12">
                                <input type="text" name="phone" class="form-control rounded-0" placeholder="{{ __('lang.phone') }}" required="" min="99999999" max="9999999999999999" value="">
                            </div>
                        </div>
                        <div class="col-12 px-0 py-3">
                            <div class="col-12">
                                <textarea class="form-control rounded-0" name="message" style="min-height:200px" placeholder="{{ __('lang.message') }}" required="" minlength="3" maxlength="1000"></textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 py-3">
                            <div class="col-12">
                                <button class="btn btn-success rounded-0" type="submit" >{{ __('lang.send message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env("RECAPTCHA_SITE_KEY") }}"></script>
<script>
grecaptcha.ready(function() {
  document.getElementById('contact-form').addEventListener("submit", function(event) {
    event.preventDefault();
    grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', {action: 'contact'}).then(function(token) {
        console.log(token);
       document.getElementById("recaptcha").value= token;
       document.getElementById('contact-form').submit();
    });
  }, false);
});
</script>
@endsection --}}
