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
		<h1 class="page-header"><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> {{$title}} {{$totalCollected}}</h1>
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