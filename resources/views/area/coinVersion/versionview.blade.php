@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}

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
		<h1 class="page-header">{{$title}} {{-- $totalCollected --}}</h1>

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
				@foreach($coinVersions as $t)
					<tr>
                        <td><a href="{!! route('getCoin', [$t['coinID']]) !!}"> {{$t['coinName']}}</a></td>
                        <td><a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection