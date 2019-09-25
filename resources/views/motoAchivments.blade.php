@extends('layouts.main')

@section('content')
<div class="section">
	<div class="container">
		<div class="page-content-wrapper__content">
			<aside class="page-aside-block">

				@include('block.sideMenu')

				@include('block.asideMap')

			</aside>

			<div class="page-content">

					@include ('block.logbookTopBlock')

					@include ('block.breadcrumbs', ['cls'=>'_mgb26'], ['clsnomgl'=>'_nomgl'])
					
					@for ($i = 0; $i < 3; $i++)
						@include ('block.motoAchivments')
					@endfor

			</div>
	</div>
</div>
</div>
@endsection
