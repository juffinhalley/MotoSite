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
	<div class="sort-widget-block sort-widget-block--grey-bg _mgb30">
		<div class="sort-widget-block__text">
			<span class="regular-text regular-text--t1">
				Новые объявления
			</span>
		</div>

		<div class="sort-widget-block__group _mgla">
			<span class="regular-text _mgr10 regular-text--t1">
				Категория:
			</span>

			<div class="select-wrapper select-wrapper--md">
				<select class="js-choice-select">
					<option selected value="1">Все</option>
					<option value="3">События</option>
					<option value="2">Люди</option>
					<option value="4">Мотоциклы</option>
				</select>
			</div>
		</div>
	</div>

	<div class="announces-block">
		<div class="announces-block__slider">
			<div class="slider slider--default" data-slider="announces" data-left-arrow="@svg('arrowLeft')" data-right-arrow="@svg('arrowRight')">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						@foreach ($slides as $item)
						<div class="swiper-slide">
							<div class="announce-item announce-item--slide">
								<a href='#' class="announce-item__image">
									<img src="{{ URL::asset('images/'.$item['image']) }}" alt="" title="">
								</a>

								<div class="announce-item__descr">
									<a href='#' class="announce-item__name">{{ $item['name'] }}</a>

									<div class="announce-item__infos">
										<div class="announce-item__infos-item">Цена: {{ $item['price'] }} грн</div>
										<div class="announce-item__infos-item">Пробег: {{ $item['probeg'] }} км</div>
										<div class="announce-item__infos-item">Год выпуска: {{ $item['year'] }}</div>
									</div>

									<div class="announce-item__text">
										{{ $item['text'] }}
									</div>	

									<div class="button-wrapper button-wrapper--right">
										<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
											<div class="button__content">
												<span class="button__text">Подробней</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="slider-arrow slider-arrow--left" data-arrow="left"></div>
				<div class="slider-arrow slider-arrow--right" data-arrow="right"></div>
			</div>
		</div>
	</div>
</section>
