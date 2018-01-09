@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

@endpush

@push('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Proofs', 11],
                ['Errors', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                title: 'My Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endpush

@push('css')
    <style>
        .typeView .detailRow a {
            font-size: 18px;
        }

        .typeView .comments-list h3 {
            margin-top: 0px;
            padding-top: 0px;
        }

        .typeView .user_name {
            font-size: 14px;
            font-weight: bold;
        }

        .typeView .comments-list .media:not(:last-child) {
            border-bottom: 1px dotted #ccc;
        }
    </style>
@endpush

@section('content')
    <div class="col-lg-12 typeView">
        <h1 class="page-header">
            <img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> <a href="{!! route('getType', [str_replace(' ', '_', $title)]) !!}"> {{$title}}</a><br/>
            <small>Type: <a href="{!! route('getCategory', [$catLink]) !!}">{{$category}}</a> |
                <select class="yearSwitch">
                    <option selected>Go To Year</option>
                    @foreach($typeYears as $v)
                        <option value="{!! route('getTypeByYear', [$typeLink, $v]) !!}">
                            {!! $v !!}
                        </option>
                    @endforeach
                </select>
            </small>
        </h1>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Type Stats</h3>
                    </div>
                    <div class="panel-body">
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
                                    <th>Unique</th>
                                    <td>33</td>
                                </tr>
                                <tr>
                                    <th><a href="{!! route('getCertfiedType', [str_replace(' ', '_', $title)]) !!}">Certified</a>
                                    </th>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <th>Bulk</th>
                                    <td>788</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                    <hr/>


                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Details Panel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="{!! route('getCategory', [$catLink]) !!}" class="list-group-item">
                                    <i class="fa fa-fw fa-check"></i> All Coins
                                </a>
                                <a href="{!! route('getCategory', [$catLink]) !!}" class="list-group-item">
                                    <i class="fa fa-fw fa-check"></i> Errors
                                </a>

                                @if(in_array($title, config('coins.rollTypes')))
                                    <a href="{!! route('getCategory', [$catLink]) !!}" class="list-group-item">
                                        <i class="fa fa-fw fa-check"></i> Coin Rolls
                                    </a>
                                @endif
                                @if(in_array($title, config('coins.folderTypes')))
                                    <a href="{!! route('getCategory', [$catLink]) !!}" class="list-group-item">
                                        <i class="fa fa-fw fa-check"></i> Folders
                                    </a>
                                @endif
                                @if(in_array($title, config('coins.mintsetTypes')))
                                    <a href="{!! route('getCategory', [$catLink]) !!}" class="list-group-item">
                                        <i class="fa fa-fw fa-check"></i> Mintsets
                                    </a>
                                @endif

                                @if(in_array($title, config('coins.fullTypes')))
                                    @if ($title === 'Winged Liberty Dime')
                                        <a href="{!! route('getType', [str_replace(' ', '_', $title)]) !!}"
                                           class="list-group-item">
                                            <i class="fa fa-fw fa-check"></i> Full Band Report
                                        </a>
                                    @endif
                                    @if ($title === 'Roosevelt Dime')
                                        <a href="{!! route('getType', [str_replace(' ', '_', $title)]) !!}"
                                           class="list-group-item">
                                            <i class="fa fa-fw fa-check"></i> Full Band Report
                                        </a>
                                    @endif
                                    @if ($title === 'Franklin Half Dollar')
                                        <a href="{!! route('getType', [str_replace(' ', '_', $title)]) !!}"
                                           class="list-group-item">
                                            <i class="fa fa-fw fa-check"></i> Full Bell Report
                                        </a>
                                    @endif
                                    @if ($title === 'Standing Liberty')
                                        <a href="{!! route('getType', [str_replace(' ', '_', $title)]) !!}"
                                           class="list-group-item">
                                            <i class="fa fa-fw fa-check"></i> Full Head Report
                                        </a>
                                    @endif
                                    @if ($title === 'Jefferson Nickel')
                                        <a href="{!! route('getType', [str_replace(' ', '_', $title)]) !!}"
                                           class="list-group-item">
                                            <i class="fa fa-fw fa-check"></i> Full Steps Report
                                        </a>
                                    @endif
                                @endif
                                @if(in_array($category, config('coins.colorCategories')))
                                    <a href="" class="list-group-item">
                                        <i class="fa fa-fw fa-check"></i> Color Report
                                    </a>
                                @endif
                            </div>
                            <div class="text-right">
                                <a href="{!! route('getCategory', [$catLink]) !!}">View All Activity <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <hr/>


            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$title}} Coins By Year
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover dataTable"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Coin</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Collected</th>
                                <th class="text-center">Investment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($collected !== false)
                                @foreach($collected as $t)
                                    <tr>
                                        <td>
                                            <a href="{!! route('collectView', [$t['collectionID']]) !!}"> {{$t['coinNickname']}}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{!! route('getTypeByYear', [str_replace(' ', '_', $t['coinType']), $t['coinYear']]) !!}"> {{$t['coinYear']}}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{!! route('getCoin', [$t['coinID']]) !!}">{{$t['coinName']}}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>View All {{$title}}</h4>
                        <p>Only saved coins</p>
                        <a class="btn btn-default btn-lg btn-block" target="_blank"
                           href="https://datatables.net/">Go</a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>
@endsection