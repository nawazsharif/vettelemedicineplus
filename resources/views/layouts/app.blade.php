<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Simple Sidebar - Start Bootstrap Template</title>
<link href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- Bootstrap core CSS -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- DataTables -->
	<link rel="stylesheet" href="{{asset('datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('datatables-responsive/css/responsive.bootstrap4.min.css')}}">
	

	<!-- Custom styles for this template -->
	<link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">


</head>

<body>

<div class="d-flex" id="wrapper">

	<!-- Sidebar -->
	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="sidebar-heading">Vettelemedicineplus</div>
		<div class="list-group list-group-flush">
			<a href="/" class="list-group-item list-group-item-action bg-light">Home</a>
			<a href="#" class="list-group-item list-group-item-action bg-light">About</a>
			<a href="#" class="list-group-item list-group-item-action bg-light">Information</a>
			<a href="#" class="list-group-item list-group-item-action bg-light">Help</a>
			<a href="#" class="list-group-item list-group-item-action bg-light">Review</a>
			<a href="#" class="list-group-item list-group-item-action bg-light">Contact</a>

			@if (Auth::check() && Auth::user()->role_id===1)
				<a href="{{url('categories')}}" class="list-group-item list-group-item-action bg-light">Category</a>
				<a href="{{url('doctor-list')}}" class="list-group-item list-group-item-action bg-light">Doctor List</a>
				<a href="{{url('pending-doctor-list')}}" class="list-group-item list-group-item-action bg-light">Panding Doctor List</a>
			@endif
			@if(Auth::check() && Auth::user()->role_id==4)
			<a href="{{url('payment')}}" class="list-group-item list-group-item-action bg-light">Payment</a>
			@else
				<a href="{{url('confirm/patients')}}" class="list-group-item list-group-item-action bg-light">Patients</a>
				<a href="{{url('pending/patients')}}" class="list-group-item list-group-item-action bg-light">Pending Patients</a>
				<a href="{{url('reject/patients')}}" class="list-group-item list-group-item-action bg-light">Reject Patients</a>
			@endif

		</div>
	</div>
	<!-- /#sidebar-wrapper -->

	<!-- Page Content -->
	<div id="page-content-wrapper">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
			<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					@guest
						@if (Route::has('register'))
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Registration
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{url('register/doctor')}}">Register as Doctor</a>
									<a class="dropdown-item" href="{{url('register')}}">Register as User</a>
									{{--w--}}
								</div>
							</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="{{route('login')}}">login</a>
						</li>
					@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST"
								      style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
				</ul>
			</div>
		</nav>

		@yield('content')
	</div>
	<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
	<script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    $(function () {
        $(".table.table-bordered").DataTable();
    });
</script>

</body>

</html>
