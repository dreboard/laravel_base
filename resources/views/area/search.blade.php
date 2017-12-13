@extends('layouts/master')

@section('content')
	<div class="col-lg-12">
		<h3 class="page-header">{{ $count }} Results for: {{$term}}</h3>

		<div class="table-responsive">

			<table class="table table-striped dataTable">
				<thead>
				<tr>
					<th>Name</th>
					<th>Type</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
					<th>Name</th>
					<th>Type</th>
				</tr>
				</tfoot>
				@foreach($search as $t)
					<tr>
						<td><a href="{!! route('getCoin', [$t->coinID]) !!}"> {{$t->coinName}}</a></td>
						<td><a href="{!! route('getType', [str_replace(' ', '_', $t->coinType)]) !!}"> {{$t->coinType}}</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection