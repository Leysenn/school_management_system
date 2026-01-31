@extends('layouts.auth_app')

@section('content')
<div class="auth-form-transparent text-left p-3">
    <div class="brand-logo text-center">
        <img src="https://i.pinimg.com/736x/38/92/4a/38924a39bff7617be37b35081d950039.jpg" 
             alt="School Logo" 
             style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #4B49AC; margin-bottom: 15px;">
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="text-center">
        <h4>Welcome back!</h4>
        <h6 class="font-weight-light">Happy to see you again!</h6>
    </div>

    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                    </span>
                </div>
                <input type="email" name="email" class="form-control form-control-lg border-left-0" id="email" value="{{ old('email') }}" required autofocus placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                    </span>
                </div>
                <input type="password" name="password" class="form-control form-control-lg border-left-0" id="password" required autocomplete="current-password" placeholder="Password">
            </div>
        </div>

        <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    {{ __('Remember me') }}
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="auth-link text-black" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="my-3">
            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
@endsection