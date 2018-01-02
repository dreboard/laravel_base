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
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Proofs',     11],
                ['Errors',      2],
                ['Commute',  2],
                ['Watch TV', 2],
                ['Sleep',    7]
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
        .typeView .detailRow a{font-size: 18px;}
        .typeView .comments-list h3 {margin-top: 0px; padding-top: 0px;}
        .typeView .user_name{
            font-size:14px;
            font-weight: bold;
        }

        .typeView .comments-list .media:not(:last-child){
            border-bottom: 1px dotted #ccc;
        }
    </style>
@endpush

@section('content')
	<div class="col-lg-12 typeView">
		<h1 class="page-header"><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> {{$title}}<br />
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
                                <th>Certified</th>
                                <td>5</td>
                            </tr>
                            <tr>
                                <th>Bulk</th>
                                <td>788</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="comments-list">
                        <h3>Recent Activity</h3>
                        <div class="media">
                            <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                                <img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'_Proof.jpg'!!}">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading user_name">Baltej Singh</h4>
                                Wow! this is really great.
                            </div>
                        </div>
                        <div class="media">
                            <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                                <img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}">
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading user_name">Baltej Singh</h4>
                                Wow! this is really great.
                            </div>
                        </div>
                        <div class="media">
                            <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                                <img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}">
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading user_name">Baltej Singh</h4>
                                Wow! this is really great.
                            </div>
                        </div>
                        <div class="media">
                            <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                                <img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}">
                            </a>
                            <div class="media-body">

                                <h4 class="media-heading user_name">Baltej Singh</h4>
                                Wow! this is really great.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <hr />


        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a class="btn btn-primary" href="{!! route('getCategory', [$catLink]) !!}">Proofs</a>
            @if(in_array($title, config('coins.rollTypes')))
                    <a class="btn btn-primary" href="{!! route('getCategory', [$catLink]) !!}">Rolls</a>
            @endif
            @if(in_array($title, config('coins.folderTypes')))
                    <a class="btn btn-primary" href="{!! route('getCategory', [$catLink]) !!}">Folders</a>
            @endif
            @if(in_array($title, config('coins.mintsetTypes')))
                <a class="btn btn-primary" href="{!! route('getCategory', [$catLink]) !!}">Mintsets</a>
            @endif
        </div>

        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="piechart" style="width: 100%; height: auto;"></div>
                        </div>
                        <div class="col-lg-12"><div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    60%
                                </div>
                            </div></div>
                    </div>

                </div>
        </div>


        <hr />
        @if($designs[0] == 'None' || ($designs[0] == ""))

        @elseif((!empty($designs[0])) || ($designs[0] !== $title))
            <h4>Designs:</h4>
            @foreach(array_chunk($designs, 2) as $chunk)
                <div class="row">
                    @foreach($chunk as $add)
                        <div class="col-md-6">
                            <a href="{!! route('getDesign', [str_replace(' ', '_', $add)]) !!}">{{$add}}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <hr />
        @endif
        @if($designTypes[0] !== 'None')
            <h4>Types:</h4>

            @foreach(array_chunk($designTypes, 2) as $chunk2)
                <div class="row">
                    @foreach($chunk2 as $add2)
                        <div class="col-md-6">
                            <a href="{!! route('getDesignType', [str_replace(' ', '_', $add2)]) !!}">{{$add2}}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <hr />
        @endif

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