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
            <h1>{{$coinData['coinName']}} <br>
                <small>
                    <a href="{!! route('getCategory', [$coinData['coinCategory']]) !!}">{{$coinData['coinCategory']}}</a> |
                    <a href="{!! route('getType', [$coinData['coinType']]) !!}">{{$coinData['coinType']}}</a> |
                    <a href="{!! route('getYear', [$coinData['coinYear']]) !!}">{{$coinData['coinYear']}}</a>
                    <br>

                </small>
            </h1>
            <div class="btn-group" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a class="btn btn-default">All {{$coinData['coinType']}} {{$coinData['coinYear']}}</a>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mint Marks
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        @foreach($mintMarks as $m)
                            <li><a href="{!! route('getCategory', [$m['mintMark']]) !!}">{{$m['mintMark']}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        <p>
            @include('partials.forms.coin_grade')
        </p>
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

            </table>
		</div>
	</div>
@endsection