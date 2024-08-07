hi {{Auth::guard('admin')->user()->email}}
{{Session::get('success')}}

<br>
<a href="{{ route('dashboard.logout')}}">Logout</a>