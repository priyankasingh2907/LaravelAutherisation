@extends('admin.layouts.app')

@section('content')
<section class="content-header">
	<div class="container-fluid my-2">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Editing Category</h1>
			</div>
			<div class="col-sm-6 text-right">
				<a href="{{route('category.index')}}" class="btn btn-primary">Back</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="container-fluid">
		<!-- @include('admin.message') -->
		<div class="card">
			<form action="" method="post" id="categoryForm" name="categoryForm">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="name">Name</label>
								<input type="text" value="{{$category->name}}" name="name" id="name" class="form-control" placeholder="Name">
								<p></p>
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label for="slug">Slug</label>
								<input type="text" readonly value="{{$category->slug}}" name="slug" id="slug" class="form-control" placeholder="Slug">
								<p></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="image">Image</label>
                                <img id="imagePreview" src="{{asset('uploads/category/'. $category->image)}}" alt="Image Preview" class="img-fluid" width="100px" height="100px">
                                <p></p>
								<input type="file" name="image" id="image" class="form-control" placeholder="image">
								<p></p>
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label for="Status" class="form-label">Status</label>
								<select name="status" class="form-control" id="status">
									<option value="1" {{($category->status ==1)?'selected':""}} class="form-control">Active</option>
									<option value="0" {{($category->status ==0)?'selected':""}} class="form-control">Inactive</option>
								</select>
								</select>
							</div>
						</div>

					</div>
					<div class="pb-5 pt-3">
						<button class="btn btn-primary" type="submit">Create</button>
						<a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-dark ml-3">Cancel</a>
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
	$("#categoryForm").submit(function(e) {
		e.preventDefault();

		$.ajax({
			url: "{{route('category.update',$category->id)}}",
			type: "POST",
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				var errors = response['message'];

                window.location.href="{{route('category.index')}}";
				if (response['status'] == true) {
					$('#name').removeClass('is-invalid');
					$('#name').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					$('#slug').removeClass('is-invalid');
					$('#slug').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					$('#image').removeClass('is-invalid');
					$('#image').siblings('p').removeClass('.invalid-feedback text-danger').html("");



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
						$('#image').addClass('is-invalid');
						$('#image').siblings('p').addClass('.invalid-feedback text-danger').html(errors['image']);

					} else {
						$('#image').removeClass('is-invalid');
						$('#image').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					}

				}


			},
			error: function(jqHR, exception) {
				console.log('something went wrong.');
			}
		});

	});


	$("#name").change(function(){
		 element = $(this).val();
// console.log(element);
		$.ajax({
			url: "{{route('getSlug')}}",
			type: "get",
			data:{title:element} ,
			dataType: 'json',
			success: function(response) {

				if(response['status']==true){
					$('#slug').val(response['slug']);
				}else{}
			},
			error: function(jqHR, exception) {
				console.log('something went wrong.');
			}});
	});
	
</script>
@endsection