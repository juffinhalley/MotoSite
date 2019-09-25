<?php 
	$slide = [
			"name"=> "Мотоцикл YAMAHA YZF-R3A",
			"image"=> "announces_image_315x214.jpg",
			"price"=> "170000",
			"probeg"=> "20000",
			"year"=> "2016",
			"text"=> "С другой стороны реализация намеченного плана развития в значительной степени обуславливает создание модели развития. 
										Дорогие друзья, начало повседневной работы по формированию позиции требует определения и уточнения форм воздействия. Задача организации, в особенности же повышение уровня..."
		];

	$slides = array_fill(0, 10, $slide);
?>

<section class="widget">
	<div class="descr-slider-block">
		<div class="descr-slider-block__descr">
			<div class="mini-descr-block">
				<div class="mini-descr-block__row{{ !$miniBlock['buttonShow'] ? ' _jcc' : '' }}">
					<span class="mini-descr-block__name regular-text regular-text--t2">
						{{ $miniBlock['text'] }}
					</span>

					@if ($miniBlock['buttonShow'])
						<a href='#' class="button paper-button paper-button--hover button--default button--md mini-descr-block__button" data-ripple-color="#b7b7b7">
							<div class="button__content">
								<span class="button__text">Смотреть</span>
							</div>
						</a>
					@endif
				</div>

				<div class="mini-descr-block__content">
					<a href='#' class="mini-descr-block__image-row">
						<div class="mini-descr-block__image">
							<img class="mini-descr-block__responsive-image" src="{{ URL::asset('images/response_image_700x320.jpg') }}" alt="" title="">
							<img class="mini-descr-block__default-image" src="{{ URL::asset('images/'.$miniBlock['image']) }}" alt="" title="">

							<div class="mini-descr-block__count">
								+115
							</div>
						</div>

						@if ($miniBlock['subdir'])
						<div class="mini-descr-block__subdir">
							{{ $miniBlock['subdir'] }}
						</div>
						@endif
					</a>

					@if ($miniBlock['imgText'])
					<a href='#' class="mini-descr-block__text">
						{{ $miniBlock['imgText'] }}
					</a>
					@endif

					@if ($miniBlock['buttonMore'])
						<div class="button-wrapper button-wrapper--right">
							<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
								<div class="button__content">
									<span class="button__text">Подробней</span>
								</div>
							</a>
						</div>
					@endif
				</div>
			</div>
		</div>

		<div class="descr-slider-block__slider">
			<div class="descr-slider-block__row{{ !$miniBlock['buttonMore'] ? ' _jcc' : '' }}">
				<span class="descr-slider-block__text regular-text regular-text--t2">
					{{ $miniBlock['text'] }}
				</span>

				@if ($miniBlock['buttonMore'])
				<a href='#' class="button paper-button paper-button--hover button--default button--md descr-slider-block__button" data-ripple-color="#b7b7b7">
					<div class="button__content">
						<span class="button__text">Смотреть все</span>
					</div>
				</a>
				@endif
			</div>

			<div class="slider slider--default slider--mini-slider" data-slider="miniSlider" data-left-arrow="@svg('arrowLeft')" data-right-arrow="@svg('arrowRight')">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						@foreach ($slides as $item)
						<div class="swiper-slide">
							<a href='#' class="mini-item-block">
								<div class="mini-item-block__image-row">
									<div class="mini-item-block__image">
										<img src="{{ URL::asset('images/'.$sliderBlock['image']) }}" alt="" title="">
									</div>

									@if ($sliderBlock['slideSubdir'])
									<div class="mini-item-block__subdir">
										{{ $sliderBlock['slideSubdir'] }}
									</div>
									@endif
								</div>

								@if ($sliderBlock['slideText'])
								<div class="mini-item-block__name">
									{{ $sliderBlock['slideText'] }}
								</div>
								@endif
							</a>
						</div>
						@endforeach
					</div>
				</div>

				<div class="slider-arrow slider-arrow--left" data-arrow="left"></div>
				<div class="slider-arrow slider-arrow--right" data-arrow="right"></div>
			</div>

			@if ($sliderBlock['respButton'])
			<div class="descr-slider-block__resp-button">
				<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
					<div class="button__content">
						<span class="button__text">Смотреть все</span>
					</div>
				</a>
			</div>
			@endif

			@if ($sliderBlock['buttonShow'])
			<div class="descr-slider-block__slider-button">
				<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
					<div class="button__content">
						<span class="button__text">Все события</span>
					</div>
				</a>
			</div>
			@endif
		</div>
	</div>
</section>
