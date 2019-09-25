@extends('layouts.grey')

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content">
				<aside class="page-aside-block">
					@include('block.sideMenu')
				</aside>

				<div class="page-content">
					@include('block.map.mapSettups')
				</div>
			</div>

			<div class="page-content-wrapper__content">
				<div class="page-content">
					@include('block.map.map')

					@include('block.map.marks')

					<section class="widget">
						<div class="banner-block">
							<img src="{{ URL::asset('images/banner_1110x300.jpg') }}">
						</div>
					</section>

					тут будет чат
				</div>
			</div>	
		</div>
	</div>
@endsection

