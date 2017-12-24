@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

@endpush

@push('scripts')
	<script>console.log('pushed');</script>
@endpush

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
	<div class="col-lg-12">
		<h2 class="page-header"><img class="smImg"
                                     src="{!! url('/img/'.str_replace(' ', '_', $coinType)).'.jpg'!!}"> {{$coinYear}} {{$title}}</h2>
        <div class="well">
            <p>Type: <a href="{!! route('getCategory', [$catLink]) !!}">{{$category}}</a> </p>
        </div>


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
                @foreach($coins as $t)
                    <tr>
                        <td><a href="{!! route('getCoin', [$t->coinID]) !!}"> {{$t->coinName}}</a></td>
                        <td><a href="{!! route('getSubCategory', [str_replace(' ', '_', $t->coinSubCategory)]) !!}"> {{$t->coinSubCategory}}</a></td>
                    </tr>
                @endforeach
            </table>
		</div>
	</div>
@endsection