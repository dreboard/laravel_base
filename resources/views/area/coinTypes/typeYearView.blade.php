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
                                     src="{!! url('/img/'.str_replace(' ', '_', $coinType)).'.jpg'!!}"> {{$coinYear}} {{$title}}<br />
            <small>Type: <a href="{!! route('getType', [str_replace(' ', '_', $coinType)]) !!}">{{$title}}</a> <br>
                Year:  <select class="yearSwitch">
                    <option selected>Go To Year</option>
                    @foreach($typeYears as $v)
                        <option value="{!! route('getTypeByYear', [str_replace(' ', '_', $coinType), $v]) !!}">
                            {!! $v !!}
                        </option>
                    @endforeach
                </select> | <a href="{!! route('getYear', [$coinYear]) !!}">All {{$coinYear}}</a>
            </small></h2>

        <p></p>
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
                        <td><a href="{!! route('getSubCategory', [str_replace(' ', '_', $t['coinSubCategory'])]) !!}"> {{$t['coinSubCategory']}}</a></td>
                    </tr>
                @endforeach
            </table>
		</div>
	</div>
@endsection