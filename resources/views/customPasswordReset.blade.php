@extends('layouts.custom-login')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
        <div class="card-body">
            <form method="post" action="{{route('custom.update')}}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-floating mb-3">
                    <input name="email" class="form-control @error('email') is-invalid @enderror"
                           id="inputEmail" type="email" placeholder="name@example.com"
                           value="{{ $email ?? old('email') }}"
                           aria-describedby="inputEmailFeedback"/>
                    <label for="inputEmail">Email address</label>
                    @error('email')
                    <div id='inputEmailFeedback' class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="password" class="form-control @error('password') is-invalid @enderror"
                           id="inputPassword" type="password"
                           placeholder="Password"
                           aria-describedby="inputPasswordFeedback"/>
                    <label for="inputPassword">Password</label>
                    @error('password')
                    <div id='inputPasswordFeedback' class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="password_confirmation" class="form-control
                            @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" type="password" placeholder="Password"
                            aria-describedby="inputPasswordConfirmationFeedback"/>
                    <label for="inputEmail">Password</label>
                    @error('password_confirmation')
                    <div id='inputPasswordConfirmationFeedback' class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
