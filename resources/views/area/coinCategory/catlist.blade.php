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

<script>
    $(document).ready(function(){

    });
</script>
@endpush

@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">All Categories</h1>
		<div class="table-responsive">
			<table class="table table-striped dataTable">
				@foreach($catLinks as $catLink)
					<tr>
						<td>
                            <a href="{!! route('getCategory', [str_replace(' ', '_', $catLink)]) !!}"> {{str_replace('_', ' ', $catLink)}}</a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection