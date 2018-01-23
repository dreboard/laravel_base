@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2
@push('side-menu')
	@foreach($catLinks as $catLink)
        <li><a href="{!! route('getCategory', [$catLink]) !!}">{{$catLink}}</a></li>
	@endforeach
@endpush
--}}
@push('css')

@endpush

@push('scripts')

@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header"><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> {{$title}} </h1>

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
                            <td>${{$totalCollected}}</td>
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
                                @if($lastCollected !== false)
                                    @foreach($lastCollected as $coinData)
                                        <tr>
                                            <td>
                                                <a href="{!! route('collectView', [$coinData['collectionID']]) !!}">{{\Coins\Traits\CoinHelper::shortName($coinData['coinName'])}}</a>
                                            </td>
                                            <td>
                                                <a href="{!! route('getCoin', [$coinData['coinID']]) !!}">{{$coinData['coinGrade']}}</a>
                                            </td>
                                            <td>${{$coinData['purchasePrice']}}</td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="#">View All <i class="fa fa-arrow-circle-right"></i></a>
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
                            <a href="#" class="list-group-item">
                                <span class="badge">1</span>
                                <i class="fa fa-fw fa-calendar"></i> Damaged
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">4</span>
                                <i class="fa fa-fw fa-comment"></i> Commented on a post
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">11</span>
                                <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">46</span>
                                <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                            </a>
                            <a href="" class="list-group-item">
                                <span class="badge">1</span>
                                <i class="fa fa-fw fa-user"></i> A new user has been added
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">2</span>
                                <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">4</span>
                                <i class="fa fa-fw fa-globe"></i> Saved the world
                            </a>

                            @if(in_array($title, config('coins.colorCategories')))
                            <a href="" class="list-group-item">
                                <span class="badge">4</span>
                                <i class="fa fa-fw fa-check"></i> Color Report
                            </a>
                            @endif
                        </div>
                        <div class="text-right">
                            <a href="">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> Types</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Type</th>
                    <th class="text-center">Collected</th>
                    <th class="text-center">Investment</th>
                    <th class="text-center">Total</th>
                </tr>
                @foreach($coinTypes as $k => $v)
                    <tr>
                    <td><a href="{!! route('getType', [$k]) !!}">{{$v}}</a></td>
                    <td class="text-center">1</td>
                    <td class="text-center">1</td>
                    <td class="text-center">1</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                {{$title}} Coins By Year
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTable" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-center">Year</th>
                        <th class="text-center">Collected</th>
                        <th class="text-center">Investment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coins as $t)
                        <tr>
                            <td><a href="{!! route('getCoin', [$t['coinID']]) !!}"> {{$t['coinName']}}</a></td>
                            <td class="text-center"><a href="{!! route('getTypeByYear', [str_replace(' ', '_', $t['coinType']), $t['coinYear']]) !!}"> {{$t['coinYear']}}</a></td>
                            <td class="text-center"><a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a></td>
                            <td class="text-center"><a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>All Collected {{$title}}</h4>
                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>

        <h3><img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $title)).'.jpg'!!}"> Coins</h3>
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
                        <td><a href="{!! route('getCoin', [$t['coinID']]) !!}"> {{$t['coinName']}}</a></td>
                        <td><a href="{!! route('getType', [str_replace(' ', '_', $t['coinType'])]) !!}"> {{$t['coinType']}}</a></td>
                    </tr>
                @endforeach
			</table>
		</div>
	</div>
@endsection