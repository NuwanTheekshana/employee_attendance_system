@extends('layouts.app1')

@section('content')



<div class="container">



    <div class="row justify-content-center" style="margin-top: 5%">
        <div class="col-md-8">
            <div class="card" style="background-color: transparent;border: none">
                <div class="card-body" style="background-color: transparent;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <center>
                            <img src="{{asset('img/logo.png')}}" alt="" style="width: 50%;height: 50%;">
                        </center>
                     
                        <h1 class="mt-3" style="font-weight: bold;font-size: 30px;">Sign In</h1>
                        <p>Hi there! Nice to see you again..!</p>
                        <center>
                        <div class="form-group mt-5">
                            <label for="email" class="float-left" style="color: #F54F5B;font-weight: bold;">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your email address" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        
                        </div>

                      

                        <div class="form-group">
                            <label for="password" class="float-left" style="color: #F54F5B;font-weight: bold;">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent" name="password" placeholder="Your password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                 
                        </div>
                                    <button type="submit" class="btn btn-danger shadow-none" style="background-color: #F54F5B">
                                        {{ __('Sign In') }}
                                    </button>
    
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                        
                                        
                        </center>
                       
                        <center>
                            <div class="form-group row mt-4">
                                <a class="btn shadow-none mr-5" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                                </a>

                                <a class="btn btn-link shadow-none ml-5" style="color: #F54F5B" href="{{ route('register') }}">
                                     {{ __('Sign Up') }}
                                </a>
                                
                            </div>
                        </center>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
