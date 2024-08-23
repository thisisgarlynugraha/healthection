@extends('layouts.auth')

@section('title')
    <title>{{ config('app.name', 'Healthection') }} | {{ __('Login') }}</title>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>{{ __('Login') }}</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                @method("POST")

                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email" autofocus>
                                        
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">{{ __('Password') }}</label>

                        @if (Route::has('password.request'))
                            <div class="float-right">
                                <a href="{{ route('password.request') }}" class="text-small">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        @endif
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                        
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="simple-footer">
        Copyright &copy; Healthection - 2024
    </div>
@endsection