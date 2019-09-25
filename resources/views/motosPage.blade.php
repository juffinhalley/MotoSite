<?php
	$mySlider = [
		[
			'typeSlider' => 'mySliderTripleLim',
			'typeSlideItems' => 'siteTopMoto',
			'styleSlider' => 'my-slider--defaultLim',
			'slideTitle' => 'Топ мотоциклы',
			'slideTitleType' => 'withSelect'
		]
	];
	$navMotos = [
		[
			'numbOfMotos' => '1247',
			'withMenu' => ''
		]
	];
	$topAllTime = [
		[
		'top' => 'топ 1',
		'text' => 'Мотоцикл YAMAHA YZF-R3A',
		'image' => 'top_item_260x180.jpg',
		'tightDescr' => '',
		'typeItem' => 'motoTop',
		'withoutTop' => '',
		'withoutTrophy' => ''
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
						@foreach ($mySlider as $item)
						<div class="gcell _mb-xl">
							@include('block.mySlider', $item)
						</div>
						@endforeach
						<div class="gcell _mb-xl">
							@include('block.motoBrand', ['typeBrands' => ''])
						</div>
						<div class="gcell _mb-xl">
							@foreach ($navMotos as $item)
								@include('block.motosNav', $item)
							@endforeach
						</div>
						<div class="gcell _mb-def">
							<div class="grid grid--1 grid--sm-2 grid--md-3 grid--hspace-def grid--vspace-md">
								@for ($i=0; $i < 9; $i++) <div class="gcell">
									@include('block.topItem', ['item' => $topAllTime[0]])
							</div>
							@endfor
						</div>
					</div>
					<div class="gcell _flex _justify-center _items-center _mb-def">
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
					<div class="gcell _mb-xl">
						<hr class="_spacer1eee">
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
