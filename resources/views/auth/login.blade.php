@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png"
                width="200" alt="google logo png" />
        </div>
        <div class="text-center mt-4 name">
            <strong>User Login</strong>
        </div>
        <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-user"></span>
                <input type="email" class="@error('email') is-invalid @enderror" name="email" required autofocus
                    placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" class=" @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="/register">Register</a>
        </div>
    </div>
    </div>
@endsection
