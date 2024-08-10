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

    <section class=" section-10">
        <div class="container">
            <div class="login-form">    
                <form action="" id="loginUser" name="loginUser" method="post">
                    <h4 class="modal-title">Login to Your Account</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" required="required"><p></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password"  name="password" id="password" required="required"><p></p>
                    </div>
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
<script>
    $("#loginUser").submit(function(e) {
		e.preventDefault();
	

		$.ajax({
			url: "{{route('login.store')}}",
			type: "POST",
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				var errors = response['message'];
				$("button[type=submit]").prop('disable',false);

				if (response['status'] == true) {

					window.location.href="{{route('login.index')}}";



				
					$('#email').removeClass('is-invalid');
					$('#email').siblings('p').removeClass('.invalid-feedback text-danger').html("");
				
                    $('#password').removeClass('is-invalid');
					$('#password').siblings('p').removeClass('.invalid-feedback text-danger').html("");



				} else {

				
					if (errors['email']) {
						$('#email').addClass('is-invalid');
						$('#email').siblings('p').addClass('.invalid-feedback text-danger').html(errors['email']);

					} else {
						$('#email').removeClass('is-invalid');
						$('#email').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					}
					
                    if (errors['password']) {
						$('#password').addClass('is-invalid');
						$('#password').siblings('p').addClass('.invalid-feedback text-danger').html(errors['password']);

					} else {
						$('#password').removeClass('is-invalid');
						$('#password').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					}

				}


			},
			error: function(jqHR, exception) {
				console.log('something went wrong.');
			}
		});

	});
</script>
@endsection