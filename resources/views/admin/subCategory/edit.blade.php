@extends('admin.layouts.app')

@section('content')
<section class="content-header">
	<div class="container-fluid my-2">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Create Sub Category</h1>
			</div>
			<div class="col-sm-6 text-right">
				<a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
	<section class="content">
		<!-- Default box -->
		<div class="container-fluid">
			@include('admin.message')
			<div class="card">
				<form action="" method="post" id="subcategoryForm" name="subcategoryForm">

					<div class="card-body">

						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="name">Name</label>
									<input type="text" value="{{$subcategory->name}}" name="name" id="name" class="form-control" placeholder="Name">
									<p></p>
								</div>
							</div>

							<div class="col-md-6">
								<div class="mb-3">
									<label for="slug">Slug</label>
									<input type="text" readonly value="{{$subcategory->slug}}" name="slug" id="slug" class="form-control" placeholder="Slug">
									<p></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="Category" class="form-label">Category</label>
									<select name="Category" class="form-control" id="Category">
										@if(!empty($categories))
										@foreach( $categories as $category)

										<option value="{{$category->id}}" class="form-control" {{($subcategory->category_id  == $category->id) ? 'selected':""}}>{{$category->name}}</option>
										@endforeach
										@endif
									</select>
									<p></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="Status" class="form-label">Status</label>
									<select name="status" class="form-control" id="status">
										<option value="1" {{($subcategory->status ==1)?'selected':""}} class="form-control">Active</option>
										<option value="0" {{($subcategory->status ==0)?'selected':""}} class="form-control">Inactive</option>
									</select>
									</select>
								</div>
							</div>


						</div>

						<div class="pb-5 pt-3">
							<button class="btn btn-primary" type="submit">Create</button>
							<a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</div>
				</form>
			</div>

		</div>
		<!-- /.card -->

	</section>


	@endsection

	@section("customJs")
	<script>
		$("#subcategoryForm").submit(function(e) {
			e.preventDefault();
			$("button[type=submit]").prop('disable', true);

			$.ajax({
				url: "{{route('subcategory.store')}}",
				type: "POST",
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData: false,
				success: function(response) {
					var errors = response['message'];
					$("button[type=submit]").prop('disable', false);

					if (response['status'] == true) {

						window.location.href = "{{route('subcategory.index')}}";



						$('#name').removeClass('is-invalid');
						$('#name').siblings('p').removeClass('.invalid-feedback text-danger').html("");
						$('#slug').removeClass('is-invalid');
						$('#slug').siblings('p').removeClass('.invalid-feedback text-danger').html("");
						$('#Category').removeClass('is-invalid');
						$('#Category').siblings('p').removeClass('.invalid-feedback text-danger').html("");



					} else {

						if (errors['name']) {
							$('#name').addClass('is-invalid');
							$('#name').siblings('p').addClass('.invalid-feedback text-danger').html(errors['name']);

						} else {
							$('#name').removeClass('is-invalid');
							$('#name').siblings('p').removeClass('.invalid-feedback text-danger').html("");
						}
						if (errors['slug']) {
							$('#slug').addClass('is-invalid');
							$('#slug').siblings('p').addClass('.invalid-feedback text-danger').html(errors['slug']);

						} else {
							$('#slug').removeClass('is-invalid');
							$('#slug').siblings('p').removeClass('.invalid-feedback text-danger').html("");
						}
						if (errors['image']) {
							$('#Category').addClass('is-invalid');
							$('#Category').siblings('p').addClass('.invalid-feedback text-danger').html(errors['Category']);

						} else {
							$('#Category').removeClass('is-invalid');
							$('#Category').siblings('p').removeClass('.invalid-feedback text-danger').html("");
						}

					}


				},
				error: function(jqHR, exception) {
					console.log('something went wrong.');
				}
			});

		});


		$("#name").change(function() {
			element = $(this).val();
			$("button[type=submit]").prop('disable', true);

			// console.log(element);
			$.ajax({
				url: "{{route('getSlug')}}",
				type: "get",
				data: {
					title: element
				},
				dataType: 'json',
				success: function(response) {
					$("button[type=submit]").prop('disable', false);

					if (response['status'] == true) {
						$('#slug').val(response['slug']);
					} else {}
				},
				error: function(jqHR, exception) {
					console.log('something went wrong.');
				}
			});
		});
	</script>
	@endsection