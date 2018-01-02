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
    <div class="col-lg-12 coinView">

        <div class="page-header">
            <h2>
                <img class="smImg"
                     src="{!! url('/img/'.str_replace(' ', '_', $coinData['coinVersion'])).'.jpg'!!}"> {{$coinData['coinName']}}
                <br>
                <small>
                    <a href="{!! route('getCategory', [$coinData['coinCategory']]) !!}">{{$coinData['coinCategory']}}</a>
                    |
                    <a href="{!! route('getType', [$coinData['coinType']]) !!}">{{$coinData['coinType']}}</a> |
                    <a href="{!! route('getYear', [$coinData['coinYear']]) !!}">{{$coinData['coinYear']}}</a>
                    <br>

                </small>
            </h2>


        </div>

        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Grade</label>
                <div class="col-sm-4">
                    @include('partials.forms.coin_grade')
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>
    </div>
@endsection