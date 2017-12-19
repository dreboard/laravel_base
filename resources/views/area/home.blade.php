@extends('layouts/master')

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">My Collection</h1>
		<p>{{config('coins.default')}}</p>


		<ul class="nav nav-tabs">
			<li class="active"><a href="#circulated" data-toggle="tab">Circulated</a></li>
			<li><a href="#commemorative" data-toggle="tab">Commemorative</a></li>
			<li><a href="#bullion" data-toggle="tab">Bullion</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="circulated">
				<div class="table-responsive">
					<table class="table table-hover">
						<tr class="active">
							<td class="darker"><strong>Types</strong></td>
							<td align="center" class="darker"><strong>Collected</strong></td>
							<td align="center" class="darker"> <strong>Investment</strong></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Half_Cent']) !!}">Half Cents</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Half Cent', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Half Cent', $userID); ?></td>
						</tr>
						<tr>
							<td><a href="{!! route('getCategory', ['Large_Cent']) !!}">Large Cents</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Large Cent', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Large Cent', $userID); ?></td>
						</tr>


						<tr>
							<td><a href="{!! route('getCategory', ['Small_Cent']) !!}">Small Cents</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Small Cent', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Small Cent', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Two_Cent']) !!}">Two Cents</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Two_Cent', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Two_Cent', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Three_Cent']) !!}">Three Cents</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Three_Cent', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Three_Cent', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Half_Dime']) !!}">Half Dimes</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Half_Dime', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Half_Dime', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Nickel']) !!}">Nickels</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Nickel', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Nickel', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Dime']) !!}">Dimes</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Dime', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Dime', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Twenty_Cent']) !!}">Twenty Cents</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Twenty_Cent', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Twenty_Cent', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Quarter']) !!}">Quarters</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Quarter', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Quarter', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Half_Dollar']) !!}">Half Dollars</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Half_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Half_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Dollar']) !!}">Dollars</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Dollar', $userID); ?></td>
						</tr>

						<tr class="active">
							<td><strong>Totals</strong></td>
							<td align="center"><strong><?php //echo $collection->getCollectionCountById($userID); ?></strong></td>
							<td align="center"><strong><?php //echo $collection->getCoinSumByAccount($userID); ?></strong></td>
						</tr>
					</table>
				</div>
			</div><!--/END HOME TAB-->
			<div class="tab-pane" id="commemorative">
				<div class="table-responsive">
					<table class="table table-hover">
						<tr class="active">
							<td class="darker"><strong>Types</strong></td>
							<td align="center" class="darker"><strong>Collected</strong></td>
							<td align="center" class="darker"> <strong>Investment</strong></td>
						</tr>

						<tr>
							<td><a href="{!! route('getType', ['Commemorative_Quarter']) !!}">Quarter</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Commemorative_Quarter', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Commemorative_Quarter', $userID); ?></td>
						</tr>
						<tr>
							<td><a href="{!! route('getType', ['Commemorative_Half_Dollar']) !!}">Half Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Commemorative_Half_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Commemorative_Half_Dollar', $userID); ?></td>
						</tr>


						<tr>
							<td><a href="{!! route('getType', ['Commemorative_Dollar']) !!}">Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Commemorative_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Commemorative_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getType', ['Commemorative_Quarter_Eagle']) !!}">Quarter Eagle</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Commemorative_Quarter_Eagle', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Commemorative_Quarter_Eagle', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getType', ['Commemorative_Five_Dollar']) !!}">Five Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Commemorative_Five_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Commemorative_Five_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getType', ['Commemorative_Ten_Dollar']) !!}">Ten Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Commemorative_Ten_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Commemorative_Ten_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getType', ['Commemorative_Fifty_Dollar']) !!}">Fifty Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Commemorative_Fifty_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Commemorative_Fifty_Dollar', $userID); ?></td>
						</tr>

						<tr class="active">
							<td><strong>Totals</strong></td>
							<td align="center"><strong><?php //echo $collection->getCollectionCountById($userID); ?></strong></td>
							<td align="center"><strong><?php //echo $collection->getCoinSumByAccount($userID); ?></strong></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="tab-pane" id="bullion">
				<div class="table-responsive">
					<table class="table table-hover">
						<tr class="active">
							<td class="darker"><strong>Types</strong></td>
							<td align="center" class="darker"><strong>Collected</strong></td>
							<td align="center" class="darker"> <strong>Investment</strong></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Gold_Dollar']) !!}">Gold Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Gold_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Gold_Dollar', $userID); ?></td>
						</tr>
						<tr>
							<td><a href="{!! route('getCategory', ['Quarter_Eagle']) !!}">Quarter Eagle</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Quarter_Eagle', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Quarter_Eagle', $userID); ?></td>
						</tr>


						<tr>
							<td><a href="{!! route('getCategory', ['Three_Dollar']) !!}">Three Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Three_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Three_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Four_Dollar']) !!}">Four Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Four_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Four_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Five_Dollar']) !!}">Five Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Five_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Five_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Ten_Dollar']) !!}">Ten Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Ten_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Ten_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Twenty_Dollar']) !!}">Twenty Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Twenty_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Twenty_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Twenty_Five_Dollar']) !!}">Twenty Five Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Twenty_Five_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Twenty_Five_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['Fifty_Dollar']) !!}">Fifty Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Fifty_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Fifty_Dollar', $userID); ?></td>
						</tr>

						<tr>
							<td><a href="{!! route('getCategory', ['One_Hundred_Dollar']) !!}">One Hundred Dollar</a></td>
							<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('One_Hundred_Dollar', $userID); ?></td>
							<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('One_Hundred_Dollar', $userID); ?></td>
						</tr>

						<tr class="active">
							<td><strong>Totals</strong></td>
							<td align="center"><strong><?php //echo $collection->getCollectionCountById($userID); ?></strong></td>
							<td align="center"><strong><?php //echo $collection->getCoinSumByAccount($userID); ?></strong></td>
						</tr>
					</table>
				</div>
			</div>

		</div>
		
		
		
		<div class="table-responsive">
			<table class="table table-striped">
				...
			</table>
		</div>
	</div>
@endsection