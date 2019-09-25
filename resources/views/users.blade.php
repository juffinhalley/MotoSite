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
				<div class="container container--no-gap">
					<div class="grid grid--1">
						<div class="gcell _mb-xl">
							@include('block.userFilterTop')
						</div>
						<div class="gcell">
							@include('block.userFilterBottom', ['users' => ''])
						</div>
						<div class="gcell _mb-xl">
								@include('widget.pagination')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
