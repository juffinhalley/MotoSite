

<section class="widget">
	<div class="slider-row-block">
		<span class="regular-text regular-text--t2">
			Лучшие Мотоклубы
		</span>

		<a href='#' class="button paper-button paper-button--hover button--default button--md _mgla" data-ripple-color="#b7b7b7">
			<div class="button__content">
				<span class="button__text">Смотреть все</span>
			</div>
		</a>
	</div>

	<div class="slider slider--triple _mgb55" data-slider="triple" data-left-arrow="@svg('arrowLeft')" data-right-arrow="@svg('arrowRight')">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@for ($i = 0; $i < 7; $i++)
				<div class="swiper-slide">
					@include('block.slideItems.club')
				</div>
				@endfor
			</div>
		</div>

		<div class="slider-arrow slider-arrow--left" data-arrow="left"></div>
		<div class="slider-arrow slider-arrow--right" data-arrow="right"></div>
	</div>
</section>
