<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BRM Test</title>
        <title>BRM Test</title>

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    </head>
    <body>
    	<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="#">
				<img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
				CRUD - Andrés Vera
			</a>

		  	<ul class="nav justify-content-center">
			  <li class="nav-item">
			    <a class="nav-link text-light" href="{{ route('inventory.index') }}">Inventario</a>
			  </li>
				<li class="nav-item">
			    <a class="nav-link text-light" href="{{ route('purchase.index') }}">Compras</a>
			  </li>

			</ul>
		</nav>
    	<div class="container">
    		@yield('content')
    	</div>
    </body>
    <script
			  src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>