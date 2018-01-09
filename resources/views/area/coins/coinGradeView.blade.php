@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

@endpush

@push('scripts')
<style>
    .table td {
        text-align: center;
    }
</style>
@endpush

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="col-lg-12">

        <div class="page-header">
            <h2>
                <img class="smImg"
                     src="{!! url('/img/'.str_replace(' ', '_', $coinData['coinVersion'])).'.jpg'!!}">
                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}">{{$coinData['coinName']}}</a>
                <br>
                <small>Grade Report</small>
                <br>
                <small>
                    <a href="{!! route('getCategory', [$coinData['coinCategory']]) !!}">{{$coinData['coinCategory']}}</a>
                    |
                    <a href="{!! route('getType', [$coinData['coinType']]) !!}">{{$coinData['coinType']}}</a> |
                    <a href="{!! route('getYear', [$coinData['coinYear']]) !!}">{{$coinData['coinYear']}}</a>
                    <br>

                </small>
            </h2>
            <div class="btn-group" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a href="{!! route('getTypeByYear', [str_replace(' ', '_', $coinData['coinType']), $coinData['coinYear']]) !!}"
                       class="btn btn-default">All {{$coinData['coinType']}} {{$coinData['coinYear']}}</a>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="mintMarks"
                            aria-haspopup="true" aria-expanded="false">
                        Mint Marks
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" id="mintMarks">
                        @foreach($mintMarks as $m)
                            <li><a href="{!! route('getCategory', [$m['mintMark']]) !!}">{{$m['mintMark']}}</a></li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Add
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{!! route('getCategory', [$m['mintMark']]) !!}">Add This Coin</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="table-responsive">
            @if($coinData['strike'] === 'Proof')
            @include('partials.tables.proof_grades')
                @else
                @include('partials.tables.business_grades')
            @endif
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

            </table>
        </div>
    </div>
@endsection