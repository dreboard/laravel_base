@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2
@push('side-menu')
	@foreach($catLinks as $catLink)
        <li><a href="{!! route('getCategory', [$catLink]) !!}">{{$catLink}}</a></li>
	@endforeach
@endpush
--}}
@push('css')

@endpush

@push('scripts')

@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header"><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> {{$title}} </h1>


        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Collected</th>
                    <td>33</td>
                </tr>
                <tr>
                    <th>Investment</th>
                    <td>${{$totalCollected}}</td>
                </tr>

                <tr>
                    <th>Face Value</th>
                    <td>$10.00</td>
                </tr>
                <tr>
                    <th>Unique</th>
                    <td>33</td>
                </tr>
                <tr>
                    <th>Certified</th>
                    <td>5</td>
                </tr>
                <tr>
                    <th>Bulk</th>
                    <td>788</td>
                </tr>
            </table>
        </div>
        <h3><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> Types</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Type</th>
                    <th class="text-center">Collected</th>
                    <th class="text-center">Investment</th>
                    <th class="text-center">Total</th>
                </tr>
                @foreach($coinTypes as $k => $v)
                    <tr>
                    <td><a href="{!! route('getType', [$k]) !!}">{{$v}}</a></td>
                    <td class="text-center">1</td>
                    <td class="text-center">1</td>
                    <td class="text-center">1</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <h3><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> Coins</h3>
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
                        <td><a href="{!! route('getCoin', [$t['coinID']]) !!}"> {{$t['coinName']}}</a></td>
                        <td><a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a></td>
                    </tr>
                @endforeach
			</table>
		</div>
	</div>
@endsection