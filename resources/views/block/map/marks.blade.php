@php
	$marks = [
		[
			'name' => 'Мотосервис',
			'image' => 'images/map_icons/service_icon.png'
		],
		[
			'name' => 'Мотосалон',
			'image' => 'images/map_icons/motoshop_icon.png'
		],
		[
			'name' => 'Место отдыха',
			'image' => 'images/map_icons/hotel_icon.png'
		],
		[
			'name' => 'Интересное место',
			'image' => 'images/map_icons/rest_icon.png'
		],
		[
			'name' => 'Место сбора',
			'image' => 'images/map_icons/gathering_place_icon.png'
		],
		[
			'name' => 'СТО',
			'image' => 'images/map_icons/service_icon_own.png'
		],
		[
			'name' => 'Мотошколы',
			'image' => 'images/map_icons/motoschool_icon.png'
		]
	]
@endphp

<section class="widget">
	<div class="map-marks">
		<div class="map-marks__title">
			Условные обозначения сделаны на этом сайте для вашего удобства 
		</div>
		
		<div class="map-marks__group">
			<div class="map-marks__button-wrapper">
				<div class="map-marks__button js-regular-block-toggler-button paper-button" data-toggler-id="1" data-ripple-color="#b7b7b7">
					<span class="map-marks__button-icon">
						@svg("question")
					</span>

					<span class="map-marks__button-text">Условные обозначения</span>

					<span class="map-marks__button-decor">
						►
					</span>
				</div>
			</div>

			<div class="map-marks__content js-regular-block-toggler" data-toggler-id="1">
				@foreach ($marks as $element)
				<div class="map-marks__item">
					<div class="map-marks__item-image">
						<img src="{{ URL::asset($element['image']) }}" alt="" title="">
					</div>

					<div class="map-marks__item-text">- {{ $element['name'] }}</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
