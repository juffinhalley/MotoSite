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

				<div class="grid grid--1">
					<div class="gcell">
						@include ('block.breadcrumbs', ['cls' => '_mgb26'], ['clsnomgl' => '_nomgl'])
					</div>
					<div class="gcell _mb-mg">
						@include('block.battlesNav')
					</div>
					<div class="gcell">
						@include ('block.mainBattles', ['battling' => ''])
					</div>
					<div class="gcell">
						@include ('block.mainBattles', ['win1' => ''])
					</div>
					<div class="gcell">
						@include ('block.mainBattles', ['win2' => ''])
					</div>
					<div class="gcell">
						@include ('block.mainBattles', ['draw' => ''])
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
