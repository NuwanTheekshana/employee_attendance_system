@extends('layouts.app1')

@section('content')

<div class="container">
    <a href="{{route('login')}}">
        <button class="btn shadow-none"><i class="fa fa-long-arrow-left" style="font-size:36px;color: #F54F5B;"></i></button>
    </a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: transparent;border: none">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <h1 style="font-weight: bold;font-size: 30px;">Sign Up</h1>
                        <center>
                        <div class="form-group row mt-5">
                            <label for="epfno" style="color: #F54F5B;font-weight: bold;">EPF Number</label>
                                <input id="epfno" type="text" class="form-control @error('epfno') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="epfno" value="{{ old('epfno') }}" required placeholder="Your EPF number" autocomplete="epfno" autofocus>

                                @error('epfno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      
                        </div>

                        <div class="form-group row">
                            <label for="fname" style="color: #F54F5B;font-weight: bold;">First Name</label>
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="fname" value="{{ old('fname') }}" required placeholder="Your first name" autocomplete="fname" autofocus>
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="lname" style="color: #F54F5B;font-weight: bold;">Last Name</label>
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="lname" value="{{ old('lname') }}" required placeholder="Your last name" autocomplete="lname" autofocus>
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="address" style="color: #F54F5B;font-weight: bold;">Address</label>
                            <input id="address" type="address" class="form-control @error('address') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="address" value="{{ old('address') }}" required placeholder="Your address" autocomplete="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    
                    </div>

                        <div class="form-group row">
                            <label for="email" style="color: #F54F5B;font-weight: bold;">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="email" value="{{ old('email') }}" required placeholder="Your email address" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>

                        <div class="form-group row">
                            <label for="password" style="color: #F54F5B;font-weight: bold;">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="password" placeholder="Your password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" style="color: #F54F5B;font-weight: bold;">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control  border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I agree to the <a href="#" style="color: #F54F5B;">Terms of Services</a> and <a href="#" style="color: #F54F5B;">Privacy Policy.</a></label>
                          </div>

                                <button type="submit" class="btn btn-danger mt-3 mb-3" style="background-color: #F54F5B">
                                    {{ __('Register') }}
                                </button>
                         
                                <p>Have an Account?&nbsp;<a href="{{route('login')}}" style="color: #F54F5B;">Sign In</a></p>
                    </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
