@if ($item['typePlaces'] == 'normal')
<a href='#' class="place-item">
	<div class="place-item__image">
		<img src="{{ URL::asset('images/placeitem_240x160.jpg') }}" alt="" title="">

		<div class="mini-descr-block__count">
			+115
		</div>
	</div>

	<div class="place-item__rating">
		@svg('star')

		<div class="place-item__rating-count">
			<span>3.8</span>&nbsp;из 5
		</div>
	</div>

	<div class="place-item__descr">
		<div class="place-item__name">
			Мотошкола «Yamaha Kherson»
		</div>

		<div class="place-item__place">
			@svg('marker')

			<span>
				Херсон,UA
			</span>
		</div>
	</div>
</a>

@elseif ($item['typePlaces'] == 'places')
<a href='#' class="place-item place-item--places">
	<div class="place-item__image">
		<img src="{{ URL::asset('images/places_397x180.jpg') }}" alt="" title="">
	</div>

	<div class="place-item__rating">
		@svg('star')

		<div class="place-item__rating-count">
			<span>3.8</span>&nbsp;из 5 (17)
		</div>
	</div>

	<div class="place-item__geo">
		@svg('marker')

		<span>
			{{ $item['geo'] }}
		</span>
	</div>

	<div class="place-item__descr">
		<div class="place-item__name">
			{{ $item['name'] }}
		</div>

		@if (isset($item['info']) || isset($item['infoAdd']))
		<div class="place-item__info">
			<div class="place-item__info-item">
				<span>{{ isset($item['info']) ? $item['info'] : '' }} </span> {{ isset($item['infoAdd']) ? $item['infoAdd'] : '' }}
			</div>

			@if (isset($item['infoSecond']))
			<div class="place-item__info-item-second">
				{{ $item['infoSecond'] }}
			</div>
			@endif

		</div>
		@endif
	</div>

</a>

@endif
