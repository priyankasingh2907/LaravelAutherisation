
@extends('Fronts.layouts.app')

@section('content')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item">Register</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            <div class="login-form">    
                <form action="" id='RegisterUser' name='RegisterUser' method="post">
                    <h4 class="modal-title">Register Now</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone">
                        <p></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"><p></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="form-group small">
                        <a href="{{route('changePassword.index')}}" class="forgot-link">Forgot Password?</a>
                    </div> 
                    <button type="submit" class="btn btn-dark btn-block btn-lg" value="Register">Register</button>
                </form>			
                <div class="text-center small">Already have an account? <a href="{{route('login.index')}}">Login Now</a></div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('customJs')
<script>
    $("#RegisterUser").submit(function(e) {
		e.preventDefault();
		$("button[type=submit]").prop('disable',true);

		$.ajax({
			url: "{{route('register.store')}}",
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

					window.location.href="{{route('register.index')}}";



					$('#name').removeClass('is-invalid');
					$('#name').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					$('#email').removeClass('is-invalid');
					$('#email').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					$('#phone').removeClass('is-invalid');
					$('#phone').siblings('p').removeClass('.invalid-feedback text-danger').html("");
                    $('#password').removeClass('is-invalid');
					$('#password').siblings('p').removeClass('.invalid-feedback text-danger').html("");



				} else {

					if (errors['name']) {
						$('#name').addClass('is-invalid');
						$('#name').siblings('p').addClass('.invalid-feedback text-danger').html(errors['name']);

					} else {
						$('#name').removeClass('is-invalid');
						$('#name').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					}
					if (errors['email']) {
						$('#email').addClass('is-invalid');
						$('#email').siblings('p').addClass('.invalid-feedback text-danger').html(errors['email']);

					} else {
						$('#email').removeClass('is-invalid');
						$('#email').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					}
					if (errors['phone']) {
						$('#phone').addClass('is-invalid');
						$('#phone').siblings('p').addClass('.invalid-feedback text-danger').html(errors['phone']);

					} else {
						$('#phone').removeClass('is-invalid');
						$('#phone').siblings('p').removeClass('.invalid-feedback text-danger').html("");
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