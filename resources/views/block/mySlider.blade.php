<?php
	$siteTopMoto = [
		[
			'typeItem' => 'motoTop',
			'top' => 'топ 1',
			'image' => 'moto_top_slide_item_235x180.jpg',
			'text' => 'Мотоцикл YAMAHA YZF-R3A'
		]
	];
	$siteTopPhoto = [
		[
			'typeItem' => 'photoTop',
			'top' => 'топ 1',
			'image' => 'moto_top_slide_item_235x180.jpg'
		]
	];
		$siteTopVideo = [
			[
				'typeItem' => 'videoTop',
				'top' => 'топ 1',
				'image' => 'moto_top_slide_item_235x180.jpg'
			]
		];
?>
<div class="my-slider {{ $item['styleSlider'] }}" data-slider="{{ $item['typeSlider'] }}">

	@if (isset($item['slideTitle']))
	<div class="my-slider__top">
		<div class="my-slider__title">
			{{ $item['slideTitle'] }}
		</div>
		<div class="my-slider__option">
			@if (isset($item['slideTitleType']))

				@if ($item['slideTitleType'] == 'withSelect')
					<div class="my-slider__select">
						<div class="select-wrapper select-wrapper--lgm select-wrapper--lGrey">
							<select class="js-choice-select">
								<option selected value="1">Все время</option>
								<option value="3">Почти всё время</option>
								<option value="2">Не всё время</option>
								<option value="4">Не совсем это время</option>
							</select>
						</div>
					</div>
				@endif

			@endif
			@if (isset($item['withoutButton']))
			@else
				<div class="my-slider__button">
					<a href="#" class="button paper-button paper-button--hover button--defgr button--mdk">
						<div class="button__content">
							<span class="button__text">Смотреть все</span>
							<span class="button__icon">
								@svg('arrowFullRight')</span>
						</div>
					</a>
				</div>
			@endif
		</div>
	</div>
	@endif

	<div class="swiper-container">

		@if ($item['typeSlideItems'] == 'siteTopMoto')
			<div class="swiper-wrapper">
				@for ($i = 0; $i < 5; $i++)
					<div class="swiper-slide">
						@include('block.topItem', ['item' => $siteTopMoto[0]])
					</div>
				@endfor
			</div>

		@elseif ($item['typeSlideItems'] == 'siteTopPhoto')
			<div class="swiper-wrapper">
				@for ($i = 0; $i < 5; $i++)
					<div class="swiper-slide">
						@include('block.topItem', ['item' => $siteTopPhoto[0]])
					</div>
				@endfor
			</div>

		@elseif ($item['typeSlideItems'] == 'siteTopUser')
			<div class="swiper-wrapper">
				@for ($i = 0; $i < 5; $i++)
					<div class="swiper-slide">
						@include('block.slideItems.userSlideItem')
					</div>
				@endfor
			</div>

		@elseif ($item['typeSlideItems'] == 'siteTopVideo')
			<div class="swiper-wrapper">
				@for ($i = 0; $i < 5; $i++)
					<div class="swiper-slide">
					@include('block.topItem', ['item' => $siteTopVideo[0]])
					</div>
				@endfor
			</div>

		@elseif ($item['typeSlideItems'] == 'default')
			<div class="swiper-wrapper">
				@for ($i=0; $i < 3; $i++)
					<div class="swiper-slide">
						<img src="{{ URL::asset('images/'.$item['defaultURL']) }}" alt="" title="">
					</div>
				@endfor
			</div>
		@endif

	</div>

	<div class="swiper-pagination"></div>

	<div class="my-slider__button-prev">
		@svg('arrowLeft')
	</div>
	<div class="my-slider__button-next">
		@svg('arrowRight')
	</div>

</div>
