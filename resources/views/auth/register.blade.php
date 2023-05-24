@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="text-center mt-4 name">
            <strong>Create Account</strong>
        </div>
        <form class="p-3 mt-3" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-user"></span>
                <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" placeholder="Name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" class=" @error('password') is-invalid @enderror" name="password" required
                    placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm Password">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-envelope"></span>
                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn mt-3">Create</button>
        </form>
        <div class="text-center fs-4">
            <p>Have an account?</p>
            <a href="/login" class="fs-4">Log In</a>
        </div>
    </div>
@endsection
