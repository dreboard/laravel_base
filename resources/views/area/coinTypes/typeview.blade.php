@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')
	@foreach($typeLinks as $typeLink)
        <li><a href="{!! route('getType', [$typeLink]) !!}">{{$typeLink}}</a></li>
	@endforeach
@endpush

@push('scripts')
	<script>console.log('pushed');</script>
@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">{{$title}}</h1>
		<div class="table-responsive">
			<table class="table table-striped">
				@foreach($coinType as $t)
					<tr>
						<td>{{$t->coinName}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection