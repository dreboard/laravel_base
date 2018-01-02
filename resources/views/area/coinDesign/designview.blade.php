@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

@endpush



@section('content')
	<div class="col-lg-12">
		<h3 class="page-header"><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> {{$title}}</h3>

            <h4>Types:</h4>
            <div class="row">
                @foreach($coinType as $t)
                    <div class="col-md-6">
                        <a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a>
                    </div>
                @endforeach
            </div>

        <br />
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Collected</th>
                    <td>33</td>
                </tr>
                <tr>
                    <th>Investment</th>
                    <td>100.00</td>
                </tr>

                <tr>
                    <th>Face Value</th>
                    <td>$10.00</td>
                </tr>
                <tr>
                    <th>Certified</th>
                    <td>5</td>
                </tr>
            </table>
        </div>

        <hr />

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