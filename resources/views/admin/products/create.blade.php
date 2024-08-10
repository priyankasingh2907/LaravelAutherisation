@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('proucts.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <form action="" method="post" id="productForm" name="productForm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="slug">Slug</label>
                                        <input readonly type="text" name="slug" id="slug" class="form-control" placeholder="slug">
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="shortdescription">Short-Description</label>
                                        <textarea name="shortdescription" id="shortdescription" cols="30" rows="10" class="summernote" placeholder="short-description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Media</h2>
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="image">
                            <p class="error"></p>

                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                        <span class="text-muted mt-3">
                                            To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Inventory</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="track_qty" value="no">
                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="yes" checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">
                                        <p class="error"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Product status</h2>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4  mb-3">Product category</h2>
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Category </option>

                                    @if(!empty($categories))
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p class="error"></p>
                            </div>
                            <div class="mb-3">
                                <label for="category">Sub category</label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                <option value="">Select sub category </option>

                                </select>
                                <p class="error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Product brand</h2>
                            <div class="mb-3">
                                <select name="brand" id="brand" class="form-control">
                                    <option value="">Select Brand </option>

                                    @if(!empty($brands))
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Featured product</h2>
                            <div class="mb-3">
                                <select name="fstatus" id="status" class="form-control">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                                <p class="error"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Create</button>
                <a href="{{route('proucts.create')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
    </form>
    <!-- /.card -->
</section>
@endsection

@section('customJs')
<script>
    $("#title").change(function() {
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





    	$("#productForm").submit(function(e) {
		e.preventDefault();
		$("button[type=submit]").prop('disable',true);

		$.ajax({
			url: "{{route('proucts.store')}}",
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

					window.location.href="{{route('proucts.index')}}";



					// $('#title').removeClass('is-invalid');
					// $('#title').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					// $('#slug').removeClass('is-invalid');
					// $('#slug').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					// $('#image').removeClass('is-invalid');
					// $('#image').siblings('p').removeClass('.invalid-feedback text-danger').html("");



				} else {

                    var errors = response['message'];

                    $(".error").removeClass('invalid-feedback').html('');

                    $("input[type='text'],select").removeClass('is-invalid');
                    $.each(errors,function(key,value){
// dd(error);
// console.log(errors);
// console.log([value][0]);
                        $(`#${key}`).addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(value);
                    });



					// if (errors['title']) {
					// 	$('#title').addClass('is-invalid');
					// 	$('#title').siblings('p').addClass('.invalid-feedback text-danger').html(errors['title']);

					// } else {
					// 	$('#title').removeClass('is-invalid');
					// 	$('#title').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					// }
					// if (errors['slug']) {
					// 	$('#slug').addClass('is-invalid');
					// 	$('#slug').siblings('p').addClass('.invalid-feedback text-danger').html(errors['slug']);

					// } else {
					// 	$('#slug').removeClass('is-invalid');
					// 	$('#slug').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					// }
					// if (errors['image']) {
					// 	$('#image').addClass('is-invalid');
					// 	$('#image').siblings('p').addClass('.invalid-feedback text-danger').html(errors['image']);

					// } else {
					// 	$('#image').removeClass('is-invalid');
					// 	$('#image').siblings('p').removeClass('.invalid-feedback text-danger').html("");
					// }

				}


			},
			error: function(jqHR, exception) {
				console.log('something went wrong.');
			}
		});

	});



    $("#category").change(function() {
        var category_id = $(this).val();
        $.ajax({
            url: "{{route('productSubcategory')}}",
            type: "get",
            data: {
                category_id: category_id
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);


                $("#sub_category").find("option").not(":first").remove();
                $.each(response["subcategory"], function(key, item) {
                    $("#sub_category").append(`<option value='${item.id}'>${item.name}</option>`)
                });

            },
            error: function(jqHR, exception) {
                console.log('something went wrong.');
            }
        });
    });
</script>
@endsection