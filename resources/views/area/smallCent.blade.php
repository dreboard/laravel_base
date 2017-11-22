@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')
	<li><a href="{{route('profile')}}">Dynamic</a> </li>
@endpush

@push('scripts')
	<script>console.log('pushed');</script>
@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">Small Cents</h1>
		<p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
	</div>
@endsection