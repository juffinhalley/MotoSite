<?php
	$mySlider = [
		[
			"typeSlider" => "mySliderTripleLim",
			"typeSlideItems" => "siteTopMoto",
			"styleSlider" => 'my-slider--defaultLim',
			"slideTitle" => 'Общий топ'
		],
		[
			"typeSlider" => "mySliderTripleLim",
			"typeSlideItems" => "siteTopMoto",
			"styleSlider" => 'my-slider--defaultLim',
			"slideTitle" => 'Мотоциклы года'
		],
		[
			"typeSlider" => "mySliderTripleLim",
			"typeSlideItems" => "siteTopMoto",
			"styleSlider" => 'my-slider--defaultLim',
			"slideTitle" => 'Мотоциклы месяца'
		],
		[
			"typeSlider" => "mySliderTripleLim",
			"typeSlideItems" => "siteTopMoto",
			"styleSlider" => 'my-slider--defaultLim',
			"slideTitle" => 'Мотоциклы недели'
		],
		[
			"typeSlider" => "mySliderTripleLim",
			"typeSlideItems" => "siteTopMoto",
			"styleSlider" => 'my-slider--defaultLim',
			"slideTitle" => 'Мотоциклы дня'
		]
	]
?>
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
							@include('block.breadcrumbs', ['clsnomgl' => '_nomgl'])
						</div>

						@foreach ($mySlider as $item)
							<div class="gcell">
								@include('block.mySlider', $item)
							</div>
							<hr class="_spacer1eee _mtb-xl">
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
