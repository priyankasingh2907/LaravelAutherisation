
@extends('Fronts.layouts.app')

@section('content')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="http://localhost/amazing-shop/">Home</a></li>
                    <li class="breadcrumb-item">Contact Us</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            <div class="section-title mt-5 ">
                <h2>Love to Hear From You</h2>
            </div>   
        </div>
    </section>

    <section>
        <div class="container">          
            <div class="row">
                <div class="col-md-6 mt-3 pe-lg-5">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.</p>
                    <address>
                    Cecilia Chapman <br>
                    711-2880 Nulla St.<br> 
                    Mankato Mississippi 96522<br>
                    <a href="tel:+xxxxxxxx">(XXX) 555-2368</a><br>
                    <a href="mailto:jim@rock.com">jim@rock.com</a>
                    </address>                    
                </div>

                <div class="col-md-6">
                @include('admin.message')

                    <form class="shake" role="form" method="post" id="contactForm" name="contact-form">
                        <div class="mb-3">
                            <label class="mb-2" for="name">Name</label>
                            <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                            <p></p>
                            <div class="help-block with-errors"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="mb-2" for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                            <p></p>
                            <div class="help-block with-errors"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="mb-2">Subject</label>
                            <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                           <p></p>
                            <div class="help-block with-errors"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="mb-2">Message</label>
                            <textarea class="summernote form-control" rows="3" id="message"  name="message" required data-error="Write your message"></textarea>
                           <p></p>
                            <div class="help-block with-errors"></div>
                        </div>
                      
                        <div class="form-submit">
                            <button class="btn btn-dark" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('customJs')
<script>

$(document).ready(function() {
  $('#summernote').summernote();
});

    	$("#contactForm").submit(function(e) {
		e.preventDefault();
		$("button[type=submit]").prop('disable',true);

		$.ajax({
			url: "{{route('contactUs.store')}}",
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

					window.location.href="{{route('contactUs.index')}}";



					$('#name').removeClass('is-invalid');
					$('#name').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					$('#email').removeClass('is-invalid');
					$('#email').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					$('#msg_subject').removeClass('is-invalid');
					$('#msg_subject').siblings('p').removeClass('.invalid-feedback text-danger').html("");
                    $('#message').removeClass('is-invalid');
					$('#message').siblings('p').removeClass('.invalid-feedback text-danger').html("");



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
					if (errors['subject']) {
						$('#msg_subject').addClass('is-invalid');
						$('#msg_subject').siblings('p').addClass('.invalid-feedback text-danger').html(errors['subject']);

					} else {
						$('#msg_subject').removeClass('is-invalid');
						$('#msg_subject').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					}
                    if (errors['message']) {
						$('#message').addClass('is-invalid');
						$('#message').siblings('p').addClass('.invalid-feedback text-danger').html(errors['message']);

					} else {
						$('#message').removeClass('is-invalid');
						$('#message').siblings('p').removeClass('.invalid-feedback text-danger').html("");
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