<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />

	<title>Users Area</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="{{ asset('/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/dist/css/sb-admin-2.css') }}" rel="stylesheet">
	<link href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    @stack('css')
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

<div id="wrapper">
	@include('partials.topNav')

	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="container-fluid main-content">
			<div class="row">

				@if(count($errors->all()))
				<div class="col-lg-12">
					<div class="alert alert-danger" role="alert">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				</div>
				@endif

				@yield('content')<!-- /.col-lg-12 DEFAULT-->

			</div>

			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->

</div>

<footer class="footer">
	<div class="container">
		<p class="text-muted"><a href="{!! route('home') !!}">Home</a> </p>
	</div>
</footer>

{{--
<script async src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><script href="{{ asset('/vendor/metisMenu/metisMenu.min.js') }}"></script>
--}}


<script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendor/metisMenu/metisMenu.min.js') }}"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/dist/js/coin_app.js?v=tg3e') }}"></script>
@stack('scripts')
</body>
</html>