@extends('layouts/master')
@push('scripts')
	<script src="js/{{$script}}"></script>
@endpush
@section('content')
	<div class="row justify-content-md-center tutorials">
		<div class="col col-lg-12">
			<h1>{{$title}}</h1>
			<p id="testPara"></p>
			<p>Welcome to {{$title ? 'Tutorial Home' : "Hello"}}</p>

			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<p>{{ $search }}  </p>
			@endsection
		</div>
	</div>

