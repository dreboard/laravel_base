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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
	<div class="col-lg-12">

        <div class="page-header">
            <h1>{{$year}} <br>
                <small>
                    <a href="{!! route('getYear', [$prev]) !!}">{{$prev}}</a> |
                    <a href="{!! route('getYear', [$next]) !!}">{{$next}}</a> |
                    <form style="width: 70px; display: inline;" id="findYearForm" class="form-inline" method="post" action="{{route('findYear')}}">
                        {{csrf_field()}}
                        <div class="input-group">

                            <input type="text" class="form-control" placeholder="year..." name="coinYear" id="yearSearch">

                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"id="findYearFormBtn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </form>
                 </small></h1>
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
                @foreach($coinData as $t)
                    <tr>
                        <td><a href="{!! route('getCoin', [$t['coinID']]) !!}"> {{$t['coinName']}}</a></td>
                        <td><a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a></td>
                    </tr>
                @endforeach
            </table>
		</div>
	</div>
@endsection