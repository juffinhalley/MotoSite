<?php
	$navPlaces = [
		[
			'typeOfPlaces' => 'Мотошколы',
			'numbOfPlaces' => '124',
			'sortOfPlaces' => 'мотошколы',
			'tab-active' => 'places',
			'withMenu' => ''
		]
	];
	$schoolPlaces = [
		[
			'typePlaces' => 'places',
			'name' => 'Мотошкола Motoschool Odessa',
			'geo' => 'Херсон,UA',
			'info' => '17',
			'infoAdd' => 'выпускников',
			'infoSecond' => 'Работаем с 12.10.1997'
		],
		[
			'typePlaces' => 'places',
			'name' => 'Мотошкола Motohouse',
			'geo' => 'Херсон,UA',
			'info' => '11',
			'infoAdd' => 'выпускников',
			'infoSecond' => 'Работаем с 12.10.2010'
		],
		[
			'typePlaces' => 'places',
			'name' => 'Мотошкола Moto Kherson',
			'geo' => 'Херсон,UA',
			'info' => '97',
			'infoAdd' => 'выпускников',
			'infoSecond' => 'Работаем с 12.10.1997'
		],
		[
			'typePlaces' => 'places',
			'name' => 'Мотошкола Super Moto',
			'geo' => 'Херсон,UA',
			'info' => '0',
			'infoAdd' => 'выпускников',
			'infoSecond' => 'Работаем с 01.01.2001'
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

					@foreach ($navPlaces as $item)
						@include('block.placesNav', $item)
					@endforeach

					<div class="grid grid-1 grid--psh-2 grid--vspace-xl grid--hspace-xl _pt-xl _flex _justify-center _psh-justify-start">
						@foreach ($schoolPlaces as $item)
							<div class="gcell">
								@include('block.placeItem', $item)
							</div>
						@endforeach
					</div>

					<div class="grid grid--1 _mb-def">
						<div class="gcell _flex _justify-center _items-center">
							<button class="button paper-button paper-button--hover button--showmore button--mds button--sb-content js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
								<div class="button__content">
									<span class="button__text">Показать ещё 15</span>
									<span class="button__icon">
										@svg('arrowBottom')
									</span>
								</div>
								<div class="paper-ripple">
									<div class="paper-ripple__background"></div>
									<div class="paper-ripple__waves"></div>
								</div>
							</button>
						</div>
					</div>

					<hr class="_spacer1eee _mb-xl">

					<div class="grid grid--1 _mb-xl">
						<div class="gcell">
							@include('widget.pagination')
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
@endsection
