@extends('Fronts.layouts.app')

@section('content')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-6 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="sub-title">
                        <h2>Categories</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionExample">


                                @if(!empty($category))
                                @foreach($category as $key => $cat)
                                <div class="accordion-item">

                                    @if(!empty($subcategories))
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$key}}" aria-expanded="false" aria-controls="collapseOne-{{$key}}">
         
                                        {{$cat->name }}
                                        </button>
                                    </h2>

                                    @else
                                    <a href="{{route('front.shop',$cat->slug)}}" class="nav-item nav-link">{{$cat->name}}</a>


                                    @endif
                                    @if(!empty($subcategories))

                                    <div id="collapseOne-{{$key}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="navbar-nav">

                                                @foreach($subcategories as $subcategory)

                                                <a href="{{route('front.shop', $cat->slug,$subcategory->slug)}}" class="nav-item nav-link">{{$subcategory->name}}</a>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                                @endforeach
                                @endif



                            </div>
                        </div>
                    </div>

                    <div class="sub-title mt-5">
                        <h2>Brand</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            @if(!empty($brands))
                            @foreach($brands as $brand)
                            <div class="form-check mb-2">
                                <input class="form-check-input brand-label" type="checkbox" name="brand[]" id="brand-{{$brand->id}}" value="{{$brand->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="brand-{{$brand->id}}">
                                    {{$brand->name}}
                                </label>
                            </div>
                            @endforeach
                            @endif


                        </div>
                    </div>

                    <div class="sub-title mt-5">
                        <h2>Price</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    $0-$100
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $100-$200
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $200-$500
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $500+
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-end mb-4">
                                <div class="ml-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">Sorting</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Latest</a>
                                            <a class="dropdown-item" href="#">Price High</a>
                                            <a class="dropdown-item" href="#">Price Low</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                              @if(!empty($products))
                                                @foreach($products as $key => $product)
                        <div class="col-md-4">
                            <div class="card product-card">

                                <div class="product-image position-relative">
                                    <a href="" class="product-img">
                                        @if(!empty($product->image))
                                        <img class="card-img-top" src="{{asset('uploads/products/'.$product->image)}}" alt=""></a>
                                    <a class="whishlist" href="222"><i class="far fa-heart"></i></a>
                                    @else
                                    <img class="card-img-top" src="{{asset('admin_assets/imgdefault-150x150.png/')}}" alt=""></a>
                                    <a class="whishlist" href="222"><i class="far fa-heart"></i></a>
                                    @endif

                                    <div class="product-action">
                                        <a class="btn btn-dark" href="#">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body text-center mt-3">
                                    <a class="h6 link" href="product.php">{{$product->title}}</a>
                                    <div class="price mt-2">
                                        <span class="h5"><strong>{{{$product->price}}}</strong></span>

                                      
                                        <span class="h6 text-underline"><del>{{$product->compare_price}}</del></span>
                                      
                                    </div>
                                </div>




                            </div>
                        </div>
                        @endforeach
                        @endif


                        <div class="col-md-12 pt-5">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                   {{$products->links()}}
                                   
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







</main>
@endsection

@section('customJs')
<script>
    $(".brand-label").change(function(){

        apply_filter();

    });

    function apply_filter(){
        var brand_ids = [];
        
        $(".brand-label:checked").each(function(){
            brand_ids.push($(this).val());
        });
        console.log(brand_ids);
        var url ='{{ url()->current()}}?';
        window.location.href= url+'brand='+brand_ids;
    }
</script>
@endsection