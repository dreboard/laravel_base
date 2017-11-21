@extends('layouts/master')

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">Search Results</h1>
		<p>
			@if(isset($search))
				{{$search}}
			@endif

		</p>
	</div>
@endsection