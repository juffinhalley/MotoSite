

<section class="widget">
	<div class="aside-map-block">
		<div class="aside-map-block__title">
			Путеводитель
		</div>

		<div class="aside-map-block__text">
			Информация про дороги и их состояние от тех, кто по ним ездит.
		</div>

		<a href='map' class="aside-map-block__map">
			<img src="{{ URL::asset('/images/map_preview_253x198.jpg') }}" alt="" title="">
		</a>

		<a href='map' class="aside-map-block__show-path">
			@include('widget.svg', ['name' => 'marker'])

			<span>Посмотреть маршрут</span>
		</a>
	</div>
</section>