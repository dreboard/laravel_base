@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')

@endpush


@push('css')
    <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
    <style>
        .list-group-item{
            border: 0;
            padding-left: 0;
            border-top: 1px solid;
            border-color: rgba(37,40,43,0.1);
        }
        .list-group .list-group-item:first-child{
            border:0;
        }
        .list-group .list-group-item a{
            color: #2895F1;
            cursor: pointer;
            text-decoration: none;
        }
        .list-group.list-group-header{
            padding:0;
            margin:0;
        }
        .list-group.list-group-body .glyphicon {
            font-size: 25px; vertical-align: middle;
        }
        .list-group-panel{
            border: 1px solid #ccdbeb;
            border-radius: 0;
        }
    </style>

@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#damagedForm").on('submit', function(e) {

                e.preventDefault();
                try{
                    var holed =  $("#holed").is(":checked") ? 1:0;
                    var cleaned = $("#cleaned").is(":checked") ? 1:0;
                    var altered= $("#altered").is(":checked") ? 1:0;
                    var scratched = $("#scratched").is(":checked") ? 1:0;
                    var damaged =  $("#damaged").is(":checked") ? 1:0;
                    var pvc = $("#pvc").is(":checked") ? 1:0;
                    var corrosion= $("#corrosion").is(":checked") ? 1:0;
                    var bent = $("#bent").is(":checked") ? 1:0;
                    var plugged = $("#plugged").is(":checked") ? 1:0;
                    var polished= $("#polished").is(":checked") ? 1:0;
                    //var damaged = $("#holed").val();
                    //var id = $("input[name=damagedID]").val();
                    //console.log(damaged);
                    $.ajax({
                        method: "POST",
                        url: "../postCollectionDamage",
                        data:  {
                            holed: holed,
                            cleaned: cleaned,
                            altered: altered,
                            scratched: scratched,
                            damaged: damaged,
                            pvc: pvc,
                            corrosion: corrosion,
                            bent: bent,
                            plugged: plugged,
                            polished: polished
                        }
                    })
                        .done(function( data ) {

                            //var obj = JSON.parse(data);
                            jQuery.each(data, function(i, obj) {
                                console.log(obj.holed);
                                console.log(i);
                                if(obj == 1){
                                    $("#"+obj+"").prop('checked', false);
                                }
                                //$("#"+obj+"").html(obj.id + " " + obj.name);
                            });



                        })
                        .fail(function(error) {
                            console.log('Error:', error);
                        })
                        .always(function(data) {
                            console.log(data);
                        });
                }catch (error){
                    console.log(error.message);
                }

            });
        });
    </script>
    <script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
@endpush

@section('content')
    <div class="col-lg-12 collectView">

        <div class="page-header">
            <h2>
                <img class="smImg"
                     src="{!! url('/img/'.str_replace(' ', '_', $coinData['coinVersion'])).'.jpg'!!}"> {{$coinData['coinNickname']}}
                <br>
                <small>
                    <a href="{!! route('getCategory', [$coinData['coinCategory']]) !!}">{{$coinData['coinCategory']}}</a>
                    |
                    <a href="{!! route('getType', [$coinData['coinType']]) !!}">{{$coinData['coinType']}}</a> |
                    <a href="{!! route('getCoin', [$coinData['coinID']]) !!}">{{$coinData['coinName']}}</a>
                    <br>

                </small>
            </h2>


        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>Collected</th>
                            <td>{{$coinData['purchaseDate']}}</td>
                        </tr>
                        <tr>
                            <th>Investment</th>
                            <td>${{$coinData['purchasePrice']}}</td>
                        </tr>

                        <tr>
                            <th>Grade</th>
                            <td><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">{{$coinData['coinGrade']}}</a></td>
                        </tr>
                        <tr>
                            <th><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">Certified</a></th>
                            <td>5</td>
                        </tr>
                        <tr>
                            <th><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">View All Collected</a></th>
                            <td>
                                <form class="form-inline">
                                    <button type="submit" class="btn btn-danger removeIt">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>

                <hr />

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Storage</h3>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Roll</th>
                                    <td>


                                        </td>
                                </tr>
                                <tr>
                                    <th>Folder</th>
                                    <td><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">Collection</a></td>
                                </tr>

                                <tr>
                                    <th>Bag</th>
                                    <td><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">Collection</a></td>
                                </tr>
                                <tr>
                                    <th><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">Collection</a></th>
                                    <td><a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">Collection</a></td>
                                </tr>
                            </table>
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
                        <div class="row">
                            <div class="col-xs-12" style="">
                                <div class="panel panel-default list-group-panel">
                                    <div class="panel-body">
                                        <ul class="list-group list-group-header">
                                            <li class="list-group-item list-group-body">
                                                <div class="row">
                                                    <div class="col-xs-6 text-left">Name</div>
                                                    <div class="col-xs-3">Size</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="list-group list-group-body" style="">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-xs-6 text-left" style=" "> <a><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Damaged </a> </div>
                                                    <div class="col-xs-3" style="">
                                                        <form class="form-inline" id="damagedCoin">
                                                            <div class="form-group">
                                                                <select id="damaged2" name="damaged2" class="form-control">
                                                                    <option value="0">No</option>
                                                                    <option value="1">Yes</option>
                                                                </select>
                                                                <input type="hidden" name="damagedID" id="damagedID" value="{{$coinData['purchaseDate']}}">
                                                            </div>
                                                        </form>
                                                        </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-xs-6 text-left" style=" ">
                                                        <a><span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                                            <span id="damageMsg">Damage</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-3" style="">
                                                        <form method="post" action="/postCollectionDamage" class="form-inline" id="damagedForm">
                                                            <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                                                            <input type="hidden" name="collectionID" id="damagedID" value="{{$coinData['collectionID']}}">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="holed" id="holed"
                                                                           @if($coinData['holed'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    Holed
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="cleaned" id="cleaned"
                                                                           @if($coinData['cleaned'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    cleaned
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="altered" id="altered"
                                                                           @if($coinData['altered'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    altered
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="scratched" id="scratched"
                                                                           @if($coinData['scratched'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    scratched
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="damaged" id="damaged"
                                                                           @if($coinData['damaged'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    damaged
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="pvc" id="pvc"
                                                                           @if($coinData['pvc'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    pvc
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="corrosion" id="corrosion"
                                                                           @if($coinData['corrosion'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    corrosion
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="bent" id="bent"
                                                                           @if($coinData['bent'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    bent
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="plugged" id="plugged"
                                                                           @if($coinData['plugged'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    plugged
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="polished" id="polished"
                                                                           @if($coinData['polished'] == 1)
                                                                           value="1" checked
                                                                           @else
                                                                           value="0"
                                                                            @endif
                                                                    >
                                                                    polished
                                                                </label>
                                                            </div>
                                                            <button type="submit" class="btn btn-default">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-xs-6 text-left" style=" "> <a><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Holed </a> </div>
                                                    <div class="col-xs-3" style="">
                                                        <form class="form-inline" id="damagedCoin">
                                                            <div class="form-group">
                                                                <select name="damaged" class="form-control">
                                                                    <option value="0">No</option>
                                                                    <option value="1">Yes</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="{!! route('getCertfiedCoin', [$coinData['coinID']]) !!}">Collection</a>
                <form class="form-inline">
                    <div class="form-group">
                        <label for="exampleInputName2"></label>
                        <select name="collectrollsID" id="collectrollsID" class="form-control">
                            @if($coinData['collectrollsID'] == 1)
                                <option selected value="">Not In Roll</option>
                            @else
                                <option selected value="">Not In Roll</option>
                            @endif
                            <option value="">Sample Roll 1</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Change</button>
                    <button type="button" class="btn btn-danger removeIt">Remove</button>
                </form>
            </div>
            <div class="col-md-6">


            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Notes</h3>
            </div>
            <div class="panel-body">

                <form>
                    <div class="form-group">
                        <label for="noteTitle">Email address</label>
                        <input type="text" class="form-control" id="noteTitle" placeholder="noteTitle">
                    </div>
                    <div id="editor" class="form-group">
                        {{--<textarea class="form-control" rows="3"></textarea>--}}
                    </div>
                    <input type="hidden" name="collectionID" value="{{$coinData['collectionID']}}" />
                    <button type="submit" class="btn btn-default">Save</button>
                </form>

            </div>
        </div>

        <hr />


    </div>
@endsection