<?php
	$placeService = [
		[
			'service' => ''
		]
	];
	$placeSchool = [
		[
			'school' => ''
		]
	];
	$placeSchool = [
		[
			'help' => ''
		]
	];
	$placeSchool = [
		[
			'shop' => ''
		]
	];
	$placeSchool = [
		[
			'rest' => ''
		]
	];
	$placeSchool = [
		[
			'interest' => ''
		]
	];
	$placeSchool = [
		[
			'gathering' => ''
		]
	];
	$reviewsSTO = [
		[
			'title' => 'Отзывы пользователей о СТО Motoservice'
		]
	];
	$markItems = [
		[
			'name' => 'Япония',
			'image' => 'japan.jpg'
		],
		[
			'name' => 'США',
			'image' => 'usa.jpg'
		],
		[
			'name' => 'Германия',
			'image' => 'german.jpg'
		]
		// [
		// 	'name' => 'Все',
		// 	'image' => 'globe.jpg'
		// ]
	]
?>
<div class="place-bottom" data-tabs>
	<div class="place-bottom__top">
		<div class="place-bottom__buttons">
			<div class="place-bottom__switch-btn is-active" data-tabs-button="1">
				Описание
			</div>
			<div class="place-bottom__switch-btn" data-tabs-button="2">
				Комментарии
			</div>
		</div>
		<div class="place-bottom__counters">
			@include('widget.statisticCounters', ['typeOfCounters' => 'ehc'])
		</div>
	</div>
	<div class="place-bottom__bottom">
		<div class="place-bottom__info" data-tabs-container="1">
			<div class="place-bottom__info-content">
				@if (isset($service))
					@foreach ($placeService as $placeInfo)
						@include('block.placeInfo', $placeInfo)
					@endforeach
				@elseif (isset($school))
					@foreach ($placeSchool as $placeInfo)
						@include('block.placeInfo', $placeInfo)
					@endforeach
				@elseif (isset($help))
					@foreach ($placeHelp as $placeInfo)
						@include('block.placeInfo', $placeInfo)
					@endforeach
				@elseif (isset($shop))
					@foreach ($placeShop as $placeInfo)
						@include('block.placeInfo', $placeInfo)
					@endforeach
				@elseif (isset($rest))
					@foreach ($placeRest as $placeInfo)
						@include('block.placeInfo', $placeInfo)
					@endforeach
				@elseif (isset($interest))
					@foreach ($placeInterest as $placeInfo)
						@include('block.placeInfo', $placeInfo)
					@endforeach
				@elseif (isset($gathering))
					@foreach ($placeGathering as $placeInfo)
						@include('block.placeInfo', $placeInfo)
					@endforeach
				@endif
				@if (isset($service))
					<div class="place-bottom__mark">
						<span class="place-bottom__mark-title">
							Мы работаем с мотоциклами производства:
						</span>
							<div class="place-bottom__mark-items">
								@foreach ($markItems as $mark)
									<div class="place-bottom__mark-item">
										<span class="place-bottom__mark-item-name" title="{{ $mark['name'] }}">
											{{ $mark['name'] }}
										</span>
										<div class="place-bottom__mark-item-image">
											<img src="{{ URL::asset('images/'.$mark['image']) }}" alt="">
										</div>
									</div>
								@endforeach
							</div>
					</div>
				@endif
			</div>
			<div class="place-bottom__info-reviews">
				@foreach ($reviewsSTO as $reviews)
					@include('block.blockReviews')
				@endforeach
			</div>
		</div>
		<div class="place-bottom__comments" data-tabs-container="2">

		</div>
		<div class="place-bottom__works-done">

		</div>
	</div>
</div>
