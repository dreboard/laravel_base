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
    <div class="col-lg-12 coinView">

        <div class="page-header">
            <h2>
                <img class="smImg"
                     src="{!! url('/img/'.str_replace(' ', '_', $coinData['coinVersion'])).'.jpg'!!}"> Add Coin<br />
                <small>{{$coinData['coinName']}}</small>
                <br>
                <small>
                    <a href="{!! route('getCategory', [$coinData['coinCategory']]) !!}">{{$coinData['coinCategory']}}</a>
                    |
                    <a href="{!! route('getType', [$coinData['coinType']]) !!}">{{$coinData['coinType']}}</a> |
                    <a href="{!! route('getYear', [$coinData['coinYear']]) !!}">{{$coinData['coinYear']}}</a>
                    <br>

                </small>
            </h2>

            <div class="btn-group">

                <a href="{!! route('getTypeByYear', [str_replace(' ', '_', $coinData['coinType']), $coinData['coinYear']]) !!}"
                   class="btn btn-default">All {{$coinData['coinType']}} {{$coinData['coinYear']}}</a>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Add <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! route('getCoin', [$coinData['coinID']]) !!}">Add Coin</a></li>
                        <li><a href="{!! route('getCoin', [$coinData['coinID']]) !!}">Add Multiple</a></li>
                        <li class="divider"></li>
                        <li><a href="{!! route('getCoin', [$coinData['coinID']]) !!}">Add Roll</a></li>
                        <li><a href="{!! route('getCoin', [$coinData['coinID']]) !!}">Add Roll</a></li>
                    </ul>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        All Mint Marks <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($mintMarks as $m)
                            <li><a href="{!! route('getCategory', [$m['mintMark']]) !!}">{{$m['mintMark']}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>

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
                                    <span class="badge">1</span>
                                    <i class="fa fa-fw fa-calendar"></i> Damaged
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <span class="badge">4</span>
                                    <i class="fa fa-fw fa-comment"></i> Commented on a post
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <span class="badge">11</span>
                                    <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <span class="badge">46</span>
                                    <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <span class="badge">1</span>
                                    <i class="fa fa-fw fa-user"></i> A new user has been added
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <span class="badge">2</span>
                                    <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <span class="badge">4</span>
                                    <i class="fa fa-fw fa-globe"></i> Saved the world
                                </a>
                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}" class="list-group-item">
                                    <span class="badge">4</span>
                                    <i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
                                </a>
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