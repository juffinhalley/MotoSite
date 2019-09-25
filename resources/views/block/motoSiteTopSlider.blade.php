<?php
	$slideMotorcycles = [
		[
			'typeItem' => 'motorcycles',
			"text" => "Yamaha yzf-r6a Thunder",
			"top" => "топ 1"
		],
		[
			'typeItem' => 'motorcycles',
			"text" => "BMW R nune T pure The one and only blade runner",
			"top" => "топ 2"
		],
		[
			'typeItem' => 'motorcycles',
			"text" => "Honda CBR1000RA Fireblade Fireborn",
			"top" => "топ 3"
		],
		[
			'typeItem' => 'motorcycles',
			"text" => "Harley-Davidson FXDR 114",
			"top" => "топ 4"
		],
		[
			'typeItem' => 'motorcycles',
			"text" => "Kawasaki Z900RS",
			"top" => "топ 5"
		]
	];
	$slideEvents = [
		[
			'typeItem' => 'events',
			"text" => "Мотопробег из Варяг в Греки",
			"top" => "4.9"
		],
		[
			'typeItem' => 'events',
			"text" => "Покатушки на Хеллоуин или что лучше не делать в другой день",
			"top" => "4.9"
		],
		[
			'typeItem' => 'events',
			"text" => "Сбор в пабе Закат",
			"top" => "4.8"
		],
		[
			'typeItem' => 'events',
			"text" => "Поездка в Херсон",
			"top" => "4.7"
		],
		[
			'typeItem' => 'events',
			"text" => "Только вперед!",
			"top" => "4.6"
		]
	];
	$slidePlaces = [
		[
			'typeItem' => 'places',
			"text" => "СТО Motohouse",
			"top" => "4.9"
		],
		[
			'typeItem' => 'places',
			"text" => "Место отдыха Hell House",
			"top" => "4.9"
		],
		[
			'typeItem' => 'places',
			"text" => "Мотосалон Motoshop",
			"top" => "4.8"
		],
		[
			'typeItem' => 'places',
			"text" => "Бар От заката до рассвета",
			"top" => "4.7"
		],
		[
			'typeItem' => 'places',
			"text" => "Трактир Обжора Бунба",
			"top" => "4.6"
		]
	];
?>

<div class="moto-site-top-slider" data-tabs>
	<div class="grid grid--1 grid--sm-2 grid--psh-4 grid--hspace-none _mb-lg">

		<div class="gcell">
			<div class="moto-site-top-slider__button is-active" data-tabs-button="1">
				<div class="moto-site-top-slider__button-icon-first moto-site-top-slider__button-icon-first--helmet">
					@svg('helmet')
				</div>
				<div class="moto-site-top-slider__button-icon-second">
					@svg('star')
				</div>
				<span>Мотоциклы</span>
			</div>
		</div>

		<div class="gcell">
			<div class="moto-site-top-slider__button" data-tabs-button="2">
				<div class="moto-site-top-slider__button-icon-first moto-site-top-slider__button-icon-first--callendar">
					@svg('callendar')
				</div>
				<div class="moto-site-top-slider__button-icon-second">
					@svg('star')
				</div>
				<span>События</span>
			</div>
		</div>

		<div class="gcell">
			<div class="moto-site-top-slider__button" data-tabs-button="3">
				<div class="moto-site-top-slider__button-icon-first moto-site-top-slider__button-icon-first--users">
					@svg('users')
				</div>
				<div class="moto-site-top-slider__button-icon-second">
					@svg('star')
				</div>
				<span>Мотоклубы</span>
			</div>
		</div>

		<div class="gcell">
			<div class="moto-site-top-slider__button" data-tabs-button="4">
				<div class="moto-site-top-slider__button-icon-first moto-site-top-slider__button-icon-first--marker">
					@svg('marker')
				</div>
				<div class="moto-site-top-slider__button-icon-second">
					@svg('star')
				</div>
				<span>Места</span>
			</div>
		</div>

	</div>


	<div class="slider-site-top _pb-xl is-active" data-slider="siteTop" data-tabs-container="1">
		<div class="swiper-container _mb-xl">
			<div class="grid _mb-xl">
				<div class="gcell gcell--2 _flex _items-center">
					<div class="swiper-button-prev">
						@svg('arrowLeft')
					</div>
				</div>
				<div class="gcell gcell--8 _flex _flex-column _align-center _justify-center">
					<span class="title title--black title--normal title--ms _text-center _mb-sm">Топ мотоциклы</span>
					<span class="text text--sm text--grey _text-center">4 новых на этой неделе</span>
				</div>
				<div class="gcell gcell--2 _flex _justify-end _items-center">
					<div class="swiper-button-next">
						@svg('arrowRight')
					</div>
				</div>
			</div>

			<div class="swiper-wrapper">
				@foreach ($slideMotorcycles as $item)
				<div class="swiper-slide">
					@include('block.topItem')
				</div>
				@endforeach
			</div>
		</div>
		<div class="grid grid--1">
			<div class="gcell _flex _justify-end _items-center">
				<button class="button paper-button paper-button--hover button--defgr button--mdsr js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
					<div class="button__content">
						<span class="button__text">Смотреть все</span>

						<span class="button__icon">
							@svg('arrowFullRight')
						</span>
					</div>
					<div class="paper-ripple">
						<div class="paper-ripple__background"></div>
						<div class="paper-ripple__waves"></div>
					</div>
				</button>
			</div>
		</div>
	</div>

	<div class="slider-site-top _pb-xl" data-slider="siteTop" data-tabs-container="2">
		<div class="swiper-container _mb-xl">
			<div class="grid _mb-xl">
				<div class="gcell gcell--2 _flex _items-center">
					<div class="swiper-button-prev">
						@svg('arrowLeft')
					</div>
				</div>
				<div class="gcell gcell--8 _flex _flex-column _align-center _justify-center">
					<span class="title title--black title--normal title--ms _text-center _mb-sm">Топ события</span>
					<span class="text text--sm text--grey _text-center">2 на этой неделе</span>
				</div>
				<div class="gcell gcell--2 _flex _justify-end _items-center">
					<div class="swiper-button-next">
						@svg('arrowRight')
					</div>
				</div>
			</div>

			<div class="swiper-wrapper">
				@foreach ($slideEvents as $item)
				<div class="swiper-slide">
					@include('block.topItem')
				</div>
				@endforeach
			</div>
		</div>
		<div class="grid grid--1">
			<div class="gcell _flex _justify-end _items-center">
				<button class="button paper-button paper-button--hover button--defgr button--mdsr js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
					<div class="button__content">
						<span class="button__text">Смотреть все</span>

						<span class="button__icon">
							@svg('arrowFullRight')
						</span>
					</div>
					<div class="paper-ripple">
						<div class="paper-ripple__background"></div>
						<div class="paper-ripple__waves"></div>
					</div>
				</button>
			</div>
		</div>
	</div>

	<div class="slider-site-top _pb-xl" data-slider="siteTop" data-tabs-container="3">
		<div class="swiper-container _mb-xl">
			<div class="grid _mb-xl">
				<div class="gcell gcell--2 _flex _items-center">
					<div class="swiper-button-prev">
						@svg('arrowLeft')
					</div>
				</div>
				<div class="gcell gcell--8 _flex _flex-column _align-center _justify-center">
					<span class="title title--black title--normal title--ms _text-center _mb-sm">Топ мотоклубы</span>
					<span class="text text--sm text--grey _text-center">127 мотоклубов</span>
				</div>
				<div class="gcell gcell--2 _flex _justify-end _items-center">
					<div class="swiper-button-next">
						@svg('arrowRight')
					</div>
				</div>
			</div>

			<div class="swiper-wrapper">
				@for ($i = 0; $i < 5; $i++) <div class="swiper-slide">
					@include('block.slideItems.club')
			</div>
			@endfor
		</div>
	</div>
	<div class="grid grid--1">
		<div class="gcell _flex _justify-end _items-center">
			<button class="button paper-button paper-button--hover button--defgr button--mdsr js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
				<div class="button__content">
					<span class="button__text">Смотреть все</span>

					<span class="button__icon">
						@svg('arrowFullRight')
					</span>
				</div>
				<div class="paper-ripple">
					<div class="paper-ripple__background"></div>
					<div class="paper-ripple__waves"></div>
				</div>
			</button>
		</div>
	</div>
</div>

<div class="slider-site-top _pb-xl" data-slider="siteTop" data-tabs-container="4">
	<div class="swiper-container _mb-xl">
		<div class="grid _mb-xl">
			<div class="gcell gcell--1 _flex _items-center">
				<div class="swiper-button-prev">
					@svg('arrowLeft')
				</div>
			</div>
			<div class="gcell gcell--3 _flex _items-center _justify-center">
				<div class="form-item">
					<div class="select-wrapper select-wrapper--lgm select-wrapper--lGrey">
						<select class="js-choice-select" data-select-search="false">
							<option value="0">все места</option>
							<option value="1">не все места</option>
							<option value="2">почти все места</option>
							<option value="3">только эти места</option>
						</select>
					</div>
				</div>
			</div>
			<div class="gcell gcell--4 _flex _flex-column _align-center _justify-center">
				<span class="title title--black title--normal title--ms _text-center _mb-sm">Топ мест на карте</span>
				<span class="text text--sm text--grey _text-center">12 новых на этой неделе</span>
			</div>
			<div class="gcell gcell--3"></div>
			<div class="gcell gcell--1 _flex _justify-end _items-center">
				<div class="swiper-button-next">
					@svg('arrowRight')
				</div>
			</div>
		</div>

		<div class="swiper-wrapper">
			@foreach ($slidePlaces as $item)
			<div class="swiper-slide">
				@include('block.topItem')
			</div>
			@endforeach
		</div>
	</div>
	<div class="grid grid--1">
		<div class="gcell _flex _justify-end _items-center">
			<button class="button paper-button paper-button--hover button--defgr button--mdsr js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
				<div class="button__content">
					<span class="button__text">Смотреть все</span>

					<span class="button__icon">
						@svg('arrowFullRight')
					</span>
				</div>
				<div class="paper-ripple">
					<div class="paper-ripple__background"></div>
					<div class="paper-ripple__waves"></div>
				</div>
			</button>
		</div>
	</div>
</div>

</div>
