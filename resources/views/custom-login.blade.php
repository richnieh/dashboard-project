@extends('layouts.custom-login')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{route('custom.login.post')}}">
                @csrf
                <div class="form-floating mb-3">
                    <input name="email" class="form-control @error('email') is-invalid @enderror"
                           id="inputEmail" type="email"
                           placeholder="name@example.com"
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
                <div class="form-check mb-3">
                    <input name="remember" class="form-check-input" id="inputRememberPassword" type="checkbox" />
                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" href="{{route('custom.link.request')}}">Forgot Password?</a>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
        </div>
    </div>
@endsection
