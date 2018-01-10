<div class="btn-group">
    <a href="{!! route('getTypeByYear', [str_replace(' ', '_', $coinData['coinType']), $coinData['coinYear']]) !!}"
       class="btn btn-default">All {{$coinData['coinType']}} {{$coinData['coinYear']}}</a>

    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Add <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{!! route('addCoin', [$coinData['coinID']]) !!}">Add Coin</a></li>
            <li><a href="{!! route('addCoin', [$coinData['coinID']]) !!}">Add Multiple</a></li>
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