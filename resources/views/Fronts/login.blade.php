@extends('Fronts.layouts.app')

@section('content')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item">Login</li>
                </ol>
            </div>
        </div>
    </section>
@if(Session::has('success'))
<p class="alert alert-success">
	{{ Session::get('success') }}
</p>
@endif
@if(Session::has('error'))
<p class="alert alert-danger">
	{{ Session::get('error') }}
</p>
@endif
    <section class=" section-10">
        <div class="container">
            <div class="login-form">    
                <form action="{{route('login.store')}}" id="loginUser" name="loginUser" method="post">
                @csrf    
				
				<h4 class="modal-title">Login to Your Account</h4>
                    <div class="form-group">
                        <input type="text" value="{{old('email')}}" class="form-control" placeholder="Email" name="email" id="email" ><p></p>
                   @error('email')
<p class="text-danger">{{$message}}</p>
				   @enderror
					</div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password"  name="password" id="password" ><p></p>
                    </div>
					@error('password')
<p class="text-danger">{{$message}}</p>
				   @enderror
                    <div class="form-group small">
                        <a href="{{route('changePassword.index')}}" class="forgot-link">Forgot Password?</a>
                    </div> 
                    <input type="submit" class="btn btn-dark btn-block btn-lg" value="Login">              
                </form>			
                <div class="text-center small">Don't have an account? <a href="{{route('register.index')}}">Sign up</a></div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('customJs')

@endsection