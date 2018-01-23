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
                <small>Main View</small>
                <br>
                <small>
                    <a href="{!! route('getCategory', [$coinData['coinCategory']]) !!}">{{$coinData['coinCategory']}}</a>
                    |
                    <a href="{!! route('getType', [$coinData['coinType']]) !!}">{{$coinData['coinType']}}</a> |
                    <a href="{!! route('getYear', [$coinData['coinYear']]) !!}">{{$coinData['coinYear']}}</a>
                    <br>

                </small>
            </h2>

@include('partials.coin.hdr_btn_group')

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover">
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
                            <th><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">Certified</a></th>
                            <td>5</td>
                        </tr>
                        <tr>
                            <th><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">View All Collected</a></th>
                            <td></td>
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
                                    <a href="{!! route('getCoinColor', [$coinData['coinID']]) !!}" class="list-group-item">
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
        <div class="panel panel-default">
            <div class="panel-heading">
                {{$coinData['coinName']}} Coins Collected
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover dataTable" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Nickname</th>
                            <th class="text-center">Grade</th>
                            <th class="text-center">Collected</th>
                            <th class="text-center">Investment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($collected as $t)
                            <tr>
                                <td>
                                    <a href="{!! route('collectView', [$t['collectionID']]) !!}"> {{$t['coinNickname']}}</a>
                                </td>
                                <td class="text-center">{{$t['coinGrade']}}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($t['purchaseDate'])->format('d/m/Y')}}</td>
                                <td class="text-center">{{$t['purchasePrice']}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.panel-body -->
        </div>
    </div>
@endsection

