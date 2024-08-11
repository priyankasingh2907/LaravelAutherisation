@extends('Fronts.layouts.app')

@section('content')

    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{route('front.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="{{route('front.shop')}}">Shop</a></li>
                    <li class="breadcrumb-item">{{$products->title}}</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-7 pt-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-5">
                    <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner bg-light">
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="{{asset('uploads/products/default-150x150.jpg')}}" alt="Image">
                            </div>
                            <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('uploads/products/default-150x150.jpg')}}" alt="Image">
                            </div>
                            <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('uploads/products/default-150x150.jpg')}}" alt="Image">
                            </div>
                            <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('uploads/products/default-150x150.jpg')}}" alt="Image">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="bg-light right">
                        <h1>{{$products->title}}</h1>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        @if($products->compare_price >0)
                        <h2 class="price text-secondary"><del>${{$products->compare_price}}</del></h2>
                       @endif
                        <h2 class="price ">${{$products->price}}</h2>

                        <p>{{$products->shortdescription}}</p>
                        <a href="javascript:void(0);" onclick="addtocart({{$products->id}});" class="btn btn-dark"><i class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART</a>
                    </div>
                </div>

                <div class="col-md-12 mt-5">lproduct
                    <div class="bg-light">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping & Returns</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <p>
                                {{$products->description}}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi.</p>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <p>Lorem, ipsum dolor sit ametam commodi.</p>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>           
        </div>
    </section>

    <section class="pt-5 section-8">
        <div class="container">
            <div class="section-title">
                <h2>Related Products</h2>
            </div> 
        <div class="row">


@if(!empty($relatedProducts))
     @foreach($relatedProducts as $relproduct)

        <div class="col-3">
                <div id="related-products" class="carousel">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                            <a href="{{route('front.shop')}}" class="product-img"><img class="card-img-top" src="{{asset('uploads/products/default-150x150.png')}}" alt=""></a>
                            <a class="whishlist" href="222"><i class="far fa-heart"></i></a>                            

                            <div class="product-action">
                                <a class="btn btn-dark" href="javascript:void(0);" onclick="addtocart({{$relproduct->id}});">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>                            
                            </div>
                        </div>                        
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="">{{$relproduct->title}}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>${{$relproduct->compare_price}}</strong></span>
                                <span class="h6 text-underline"><del>${{$relproduct->price}}</del></span>
                            </div>
                        </div>                        
                    </div> 
                   
                </div>
            </div>
@endforeach
@endif
        </div>
        </div>
    </section>

@endsection

@section('customJs')

<script type="text/javascript">
function addtocart(id){
    alert(id);
    $.ajax({

        url: "{{route('cart.addtocart')}}",
        type: 'post',
        data: {id: id},
        dataType:'json',
        success: function(response) {
            if(response.status == true) {
                alert("Product added to cart successfully.");
                $("#cart-count").text(response.cart_count);
                window.location.href="{{route('cart.index')}}";
            } else {
                alert("Failed to add product to cart.");
            }
        }
    });
}

</script>

@endsection