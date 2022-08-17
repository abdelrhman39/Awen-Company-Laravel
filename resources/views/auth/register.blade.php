@extends('layouts.app')
@section('content')

<div class="container-fluid mt-sm-5 ">
    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('images/Privacy policy-rafiki.png') }}" alt="{{ __('lang.login') }}">
        </div>
        <div class="col-md-6" >
            <form method="POST" action="{{ route('register') }}" id="register-form">
                @csrf
                <input type="hidden" name="recaptcha" id="recaptcha">
                <div class="col-12 p-0 mb-5" >
                    <h3 class="mb-4">{{ __('lang.register') }}<hr></h3>
                     <div class="divider"></div>
                </div>

                <div class="form-floating mb-3">
                    <input id="floatingInput" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
                    <label for="floatingInput">{{ __('lang.name') }}</label>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-floating mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                    <label for="email">{{ __('lang.email') }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-floating mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    <label for="password">{{ __('lang.password') }}</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-floating mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                    <label for="password-confirm">{{ __('lang.confirm_password') }}</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <div class="offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('lang.register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
{{-- @section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env("RECAPTCHA_SITE_KEY") }}"></script>
<script>
grecaptcha.ready(function() {
  document.getElementById('register-form').addEventListener("submit", function(event) {
    event.preventDefault();
    grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', {action: 'register'}).then(function(token) {
       document.getElementById("recaptcha").value = token;
       document.getElementById('register-form').submit();
    });
  }, false);
});
</script>
@endsection --}}






