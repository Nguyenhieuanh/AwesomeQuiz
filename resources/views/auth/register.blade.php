@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-8 col-md-4 col-lg-4 mx-auto">
            <div class="text-center m-2">
                <div class="icon-block rounded-circle">
                    <i class="material-icons align-middle md-36 text-muted">edit</i>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-white text-center">
                    <h4 class="card-title">{{ __('Register') }}</h4>
                    <p class="card-subtitle">Create a new account</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                                <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="form-group">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        <div class="form-group text-center">
                            <label class="custom-control custom-checkbox m-0">
                                <input type="checkbox" class="custom-control-input" checked>
                                <span class="custom-control-indicator"></span>
                                I agree to the&nbsp;<a href="#">Terms of Use</a>
                            </label>
                        </div>
                        <p class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span class="btn-block-text">Sign Up</span>
                            </button>
                        </p>
                        <div class="text-center">Already signed up? <a href="guest-login.html">Log in</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
