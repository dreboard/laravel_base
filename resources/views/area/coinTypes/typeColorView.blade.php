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
        var coinType = "{{$type}}";
    </script>
    <script src="{{ asset('/dist/js/types.js?v=tg3e') }}"></script>
@endpush

@push('css')
    <style>
        #colors {
            overflow: hidden;
        }
        .type-color-grade td {
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="col-lg-12">

        <div class="page-header">
            <h2>
                <img class="smImg" src="{!! url('/img/'.str_replace(' ', '_', $type)).'.jpg'!!}">
                <a href="{!! route('getType', [str_replace(' ', '_', $type)]) !!}">{{$type}}</a>
                <br>
                <small>Color Report</small>
            </h2>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive reportTbl">
                    <table class="table table-hover">
                        <tr>
                            <th>Red</th>
                            <td>{{$colors['red']}}</td>
                        </tr>
                        <tr>
                            <th>Red Brown</th>
                            <td>{{$colors['redBrown']}}</td>
                        </tr>
                        <tr>
                            <th>Brown</th>
                            <td>{{$colors['brown']}}</td>
                        </tr>
                        <tr>
                            <th>Unclassified</th>
                            <td>{{$colors['none']}}</td>
                        </tr>
                    </table>
                </div>

                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive reportTbl">
                            <div id="colors"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> By Coin</h3>
                    </div>
                    <div class="panel-body fixed-panel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                @foreach($coins as $t)
                                    <tr>
                                        <td>
                                            <a href="{!! route('getCertfiedCoin', [$t['coinID']]) !!}">{{$t['coinName']}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="#">View All <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive reportTbl">
                    <table class="table table-hover">
                        <tr>
                            <th>Business Strikes</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Red</th>
                            <td>{{$colors['red']}}</td>
                        </tr>
                        <tr>
                            <th>Red Brown</th>
                            <td>{{$colors['redBrown']}}</td>
                        </tr>
                        <tr>
                            <th>Brown</th>
                            <td>{{$colors['brown']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive reportTbl">
                    <table class="table table-hover">
                        <tr>
                            <th>Proof Strikes</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Red</th>
                            <td>{{$colors['red']}}</td>
                        </tr>
                        <tr>
                            <th>Red Brown</th>
                            <td>{{$colors['redBrown']}}</td>
                        </tr>
                        <tr>
                            <th>Brown</th>
                            <td>{{$colors['brown']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <hr>
        <div class="table-responsive">
            <table class="table table-hover type-color-grade">
                <tr>
                    <th>Grade</th>
                    <th class="text-center">Raw</th>
                    <th class="text-center">Certified</th>
                    <th class="text-center">Total</th>
                </tr>
                <tr>
                    <th>MS-70</th>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th>MS-69</th>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th>MS-68</th>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th>MS-67</th>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
            </table>
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