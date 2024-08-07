@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
    <button class="close" type="button" data-dismiss='alert' aria-hidden="true">X</button>
    <h4><i class="icon fa fa-ban "></i>Alert!</h4>{{Session::get('error')}}
</div>

@endif

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
    <button class="close" type="button" data-dismiss='alert' aria-hidden="true">X</button>
    <h4><i class="icon fa fa-check "></i>success!</h4>{{Session::get('success')}}
</div>

@endif