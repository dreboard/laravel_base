@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

@endpush



@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">{{$title}} Collection</h1>
        <ul>
            @foreach($coinType as $t)
                <li>
                    <a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a>
                </li>
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