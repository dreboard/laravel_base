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
                     src="{!! url('/img/'.str_replace(' ', '_', $coinData['coinVersion'])).'.jpg'!!}"> <a href="{!! route('getCoin', [$coinData['coinID']]) !!}">{{$coinData['coinName']}}</a>
                <br>
                <small>Color Report</small>
            </h2>
            @include('partials.coin.hdr_btn_group')
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Red</th>
                            <td>33</td>
                        </tr>
                        <tr>
                            <th>Red-Brown</th>
                            <td>100</td>
                        </tr>

                        <tr>
                            <th>Brown</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Unclassified</th>
                            <td>54</td>
                        </tr>
                    </table>
                </div>

                <hr />

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Recent Transactions</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Grade</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>10/21/2013</td>
                                    <td>MS-67</td>
                                    <td>$321.33</td>
                                </tr>
                                <tr>
                                    <td>10/21/2013</td>
                                    <td>MS-67</td>
                                    <td>$234.34</td>
                                </tr>
                                <tr>
                                    <td>10/21/2013</td>
                                    <td>MS-67</td>
                                    <td>$724.17</td>
                                </tr>
                                <tr>
                                    <td>10/21/2013</td>
                                    <td>MS-67</td>
                                    <td>$23.71</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="{!! route('getCoin', [$coinData['coinID']]) !!}">View All <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Details Panel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <i class="fa fa-fw fa-calendar"></i> Main
                                </a>
                                <a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <i class="fa fa-fw fa-comment"></i> Grades
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <i class="fa fa-fw fa-truck"></i> Errors
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <i class="fa fa-fw fa-money"></i> Damaged
                                </a>
                                @if(in_array($coinData['coinCategory'], config('coins.colorCategories')))
                                    <a href="{!! route('getCoin', [$coinData['coinCategory']]) !!}" class="list-group-item">
                                        <i class="fa fa-fw fa-check"></i> Color Report
                                    </a>
                                @endif
                            </div>
                            <div class="text-right">
                                <a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>



        <hr />

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