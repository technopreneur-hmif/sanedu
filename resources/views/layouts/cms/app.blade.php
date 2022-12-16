<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') - Sanedu Indonesia</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('assets/css/cms.css') }}">
    </head>
    <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
				<div class="p-4">
		  		<h1><a href="#" class="logo">Admin</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	          <a href="#">User</a>
	          </li>
	          <li>
	          <a href="#">Keuangan</a>
	          </li>
	          <li>
              <a href="#">Absensi</a>
	          </li>
	          <li>
              <a href="#">Ujian</a>
	          </li>
              <br>
              <li>
                <a class="btn btn-danger" href="{{ route('logoutadmin') }}">Logout</a>
              </li>
	        </ul>
	      </div><br><br><br><br>
          <br><br><br><br><br>
          <br><br><br><br><br><br><br>
    	</nav>
            @yield('content')
		</div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/cms.js') }}"></script>

  </body>
</html>
