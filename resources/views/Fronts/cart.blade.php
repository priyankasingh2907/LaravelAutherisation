@extends('Fronts.layouts.app')

@section('content')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                    <li class="breadcrumb-item">Cart</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-9 pt-4">
        <div class="container">
            <div class="row">
                @if(Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                </div>
                @endif
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table" id="cart">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(!empty($cartContent))
                                @foreach($cartContent as $item)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <img src="{{asset('uploads/products/default-150x150.png')}}" width="50px" height="50px">
                                            <h2>{{$item->name}}</h2>
                                        </div>
                                    </td>
                                    <td>${{$item->price}}</td>
                                    <td>
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub" data-id="{{$item->rowId }}">
                                                    <i cla ss="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm  border-0 text-center" data-id="{{$item->rowId }} " value="{{$item->qty}}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        ${{ $item->price*$item->qty}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="deleteItem('{{$item->rowId }}');"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summery</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <div>Subtotal</div>
                                <div>${{ Cart::subtotal() }}</div>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <div>Shipping</div>
                                <div>$0</div>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <div>Total</div>
                                <div>${{ Cart::subtotal() }}</div>
                            </div>
                            <div class="pt-5">
                                <a href="{{route('checkout.index')}}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="input-group apply-coupan mt-4">
                        <input type="text" placeholder="Coupon Code" class="form-control">
                        <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('customJs')
<script>
    $('.add').click(function(){
      var qtyElement = $(this).parent().prev(); // Qty Input
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue < 10) {
        var rowId = $(this).data('id');
        
          var newQty =qtyElement.val();
        // console.log(newQty , $rowId);
          qtyElement.val(qtyValue+1);

          updateCart(rowId , newQty)
      }            
  });

  $('.sub').click(function(){
      var qtyElement = $(this).parent().next(); 
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue > 1) {
        var rowId = $(this).data('id');
       
          var newQty =qtyElement.val();
        // console.log(newQty , $rowId);

          qtyElement.val(qtyValue-1);

          updateCart(rowId , newQty)
      }        
  });

  function updateCart(rowId , qty){
    $.ajax({
        url: "{{route('cart.update')}}",
        type: "post",
        data: {rowId: rowId, qty: qty},
        success: function(response) {
          if(response.status == true){
window.location.href = "{{ route('cart.index')}}";
          }
        },
        error: function(jqHR, exception) {
            console.log('something went wrong.');
        }
    });}
    function deleteItem(rowId){
        if(confirm("Are you sure you want to delete ?")){
            $.ajax({
        url: "{{route('cart.deleteCart')}}",
        type: "post",
        data: {rowId: rowId},
        success: function(response) {
          if(response.status == true){
window.location.href = "{{ route('cart.index')}}";
          }
        },
        error: function(jqHR, exception) {
            console.log('something went wrong.');
        }
    });
        }
    }
</script>
@endsection