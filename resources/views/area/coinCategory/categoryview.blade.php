@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')
	@foreach($catLinks as $catLink)
        <li><a href="{!! route('getCategory', [$catLink]) !!}">{{$catLink}}</a></li>
	@endforeach
@endpush

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@push('scripts')

	<script>
        $(document).ready(function(){
            //$('.dataTable').DataTable();
        });
	</script>
@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">{{$title}} {{$totalCollected}}</h1>
        <ul>
            @foreach($coinTypes as $k => $v)
                <li><a href="{!! route('getType', [$k]) !!}">{{$v}}</a></li>
            @endforeach
        </ul>
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
				@foreach($coinCategory as $t)
					<tr>
						<td>{{$t->coinName}}</td><td>{{$t->coinType}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection