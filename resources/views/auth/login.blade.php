@extends('layouts.app')
@section('content')
<div class="container-fluid mt-sm-5 ">
    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('images/Privacy policy-rafiki.png') }}" alt="{{ __('lang.login') }}">
        </div>
        <div class="col-md-6" >
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="container-fluid" >
                    <h3>{{ __('lang.login') }}</h3>
                     <div class="divider"></div>
                     <hr>
                </div>

                <div class="form-floating mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="floatingInput" placeholder="{{ __('lang.email') }}" >
                    <label for="floatingInput">{{ __('lang.email') }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="floatingPassword" placeholder="{{ __('lang.password') }}" >
                    <label for="floatingPassword">{{ __('lang.password') }}</label>

                    @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group mb-3 ">
                    <input class="form-check-input ms-2 me-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="position:relative;">

                    <label class="form-check-label" for="remember" style="position:relative;">
                        {{ __('lang.remember_me') }}
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-3">
                        {{ __('lang.login') }}
                    </button>
                    <br>
                    @if (Route::has('password.request'))
                        <a class=" btn-link " href="{{ route('password.request') }}">
                            {{ __('lang.forget_your_password') }}
                        </a>
                    @endif
                </div>



            </form>
        </div>
    </div>
</div>
@endsection
{{-- #fbbd2a --}}
