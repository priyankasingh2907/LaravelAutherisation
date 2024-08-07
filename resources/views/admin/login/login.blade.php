<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>Laravel Shop :: Administrative Panel</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/css/custom.css')}}">
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{route('admin.login')}}" class="h3">Administrative Panel</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
              @include('admin.message')
                <form action="{{ route('admin.authenticate')}}" method="post">
                @CSRF    
                <div class="input-group mb-3">
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                      
                    </div>
                    @error('email')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                       
                    </div>
                    @error('password')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    <div class="row">
                        <!-- <div class="col-8">
					  			<div class="icheck-primary">
									<input type="checkbox" id="remember">
									<label for="remember">
						  				Remember Me
									</label>
					  			</div>
							</div> -->
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1 mt-3">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{asset('admin_assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin_assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin_assets/js/demo.js')}}"></script>
    <script src="">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        console.log('hi')
    </script>
</body>

</html>