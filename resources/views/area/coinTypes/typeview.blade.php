@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

@endpush

@push('scripts')

@endpush

@push('css')

@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header"><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> {{$title}}</h1>
        <div class="well2">
            <p>Type: <a href="{!! route('getCategory', [$catLink]) !!}">{{$category}}</a> |
            <select class="yearSwitch">
                    <option selected>Go To Year</option>
                @foreach($typeYears as $v)
                    <option value="{!! route('getTypeByYear', [$typeLink, $v]) !!}">
                        {!! $v !!}
                    </option>
                @endforeach
            </select>
            </p>

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
                </table>
            </div>
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