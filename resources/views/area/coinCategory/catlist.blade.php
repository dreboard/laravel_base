@extends('layouts/master')
{{--
-- Small cent area

--}}

{{-- Route Number 2--}}
@push('side-menu')
	@foreach($catLinks as $catLink)
        <li><a href="{!! route('getCategory', [$catLink]) !!}">{{$catLink}}</a></li>
	@endforeach
@endpush

@push('css')

@endpush

@push('scripts')

<script>
    $(document).ready(function(){

    });
</script>
@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">Small Cents</h1>
		<div class="table-responsive">
			<table class="table table-striped dataTable">
				@foreach($catList as $cat)
					<tr>
						<td>{{$cat}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection