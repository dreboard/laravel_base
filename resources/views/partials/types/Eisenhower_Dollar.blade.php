<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Type & Variety Collection</h3>
    </div>
    <div class="panel-body">
        <div class="list-group">
            <a href="{!! route('getTypeByYear', [$typeLink, 1972]) !!}" class="list-group-item">
                <i class="fa fa-fw fa-calendar"></i> 1972 P Type Collection
            </a>
            <a href="{!! route('getTypeByYear', [$typeLink, 1976]) !!}" class="list-group-item">
                <i class="fa fa-fw fa-calendar"></i> 1976 Variety Set
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