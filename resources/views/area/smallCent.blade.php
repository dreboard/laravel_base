@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

	<li><a href="{{route('profile')}}">All Types</a> </li>

@endpush

@push('scripts')
	<script>console.log('pushed');</script>
@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">Small Cents</h1>
		<div class="table-responsive">
			<table class="table table-striped">
				@foreach($coins as $coin)
					<tr>
						<td>{{$coin->coinName}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection