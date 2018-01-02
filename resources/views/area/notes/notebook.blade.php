@extends('layouts/master')
@push('side-menu')

@endpush

@push('scripts')

@endpush

@push('css')

@endpush
@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">{{$title}}</h1>

		<form >

			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" class="form-control" placeholder="Name" required="">
			</div>

			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control" placeholder="Password" required="">
			</div>

			<div class="form-group">
				<strong>Email:</strong>
				<input type="email" name="email" class="form-control" placeholder="Email" required="">
			</div>

			<div class="form-group">
				<button class="btn btn-success btn-submit">Submit</button>
			</div>

		</form>

		<div class="table-responsive">
			<table class="table table-hover">
				<tr class="active">
					<td class="darker"><strong>Notes</strong></td>
					<td align="center" class="darker"></td>
					<td align="center" class="darker"></td>
				</tr>

				<tr>
					<td>Century/Year</td>
					<td><a href="#">Note Name</a></td>
					<td>Dec 26yh 2017 11:01:55</td>
				</tr>
				<tr>
					<td>Metal</td>
					<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Large Cent', $userID); ?></td>
					<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Large Cent', $userID); ?></td>
				</tr>


				<tr>
					<td>Design</td>
					<td align="center"><?php //echo $collection->getTotalCollectedCoinsByID('Small Cent', $userID); ?></td>
					<td align="center"><?php //echo $collection->getTotalInvestmentSumByCategory('Small Cent', $userID); ?></td>
				</tr>

				<tr>
					<td>Proofs</td>
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



		

	</div>
@endsection