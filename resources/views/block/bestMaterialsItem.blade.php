<a href="#" class="best-materials-item">
	<div class="best-materials-item__title">
		{{ $item['title'] }}
	</div>

	@if ($item['type'] == 'photo')
	<div class="best-materials-item__wrapper">
		<div class="best-materials-item__image">
			<img src="{{ URL::asset('images/top_materials_item_255x160.jpg') }}" alt="" title="">
		</div>
	</div>

	@elseif ($item['type'] == 'video')
	<div class="best-materials-item__wrapper">
		<div class="best-materials-item__image">
			<img src="{{ URL::asset('images/top_materials_item_255x160.jpg') }}" alt="" title="">
			<div class="best-materials-item__hover-video">
				@svg('play')
			</div>
		</div>
	</div>

	@elseif ($item['type'] == 'user')
	<div class="best-materials-item__wrapper">
		<div class="best-materials-item__image">
			<div class="best-materials-item__user-wrapper">
				<div class="best-materials-item__user">
					<img src="{{ URL::asset('images/top_materials_item_255x160.jpg') }}" alt="" title="">
				</div>
				<div class="best-materials-item__user-name">
					Константин Никольский
				</div>
				<div class="best-materials-item__user-geo">
					@svg('marker')
					<span>Запорожье, UA</span>
				</div>
			</div>
			<div class="best-materials-item__rep">
				+16
			</div>
		</div>
	</div>

	@elseif ($item['type'] == 'moto')
	<div class="best-materials-item__wrapper">
		<div class="best-materials-item__image">
			<img src="{{ URL::asset('images/top_materials_item_255x160.jpg') }}" alt="" title="">
			<div class="best-materials-item__hover-counters">
				@include('widget.statisticCounters')
			</div>
		</div>
		<div class="best-materials-item__descr">
			Yamaha yzf-r6a &laquo;Thunder&raquo;
		</div>
	</div>

	@elseif ($item['type'] == 'event')
	<div class="best-materials-item__wrapper">
		<div class="best-materials-item__image">
			<img src="{{ URL::asset('images/top_materials_item_255x160.jpg') }}" alt="" title="">
			<div class="best-materials-item__hover-counters">
				@include('widget.statisticCounters')
			</div>
		</div>
		<div class="best-materials-item__descr">
			Мотопробег из Варяг в Греки
		</div>
	</div>

	@elseif ($item['type'] == 'article')
	<div class="best-materials-item__wrapper">
		<div class="best-materials-item__image">
			<img src="{{ URL::asset('images/top_materials_item_255x160.jpg') }}" alt="" title="">
			<div class="best-materials-item__hover-title">
				<span class="best-materials-item__hover-text">
					Читать
				</span>
				<span class="best-materials-item__hover-arrow"></span>
			</div>
			<div class="best-materials-item__hover-counters">
				@include('widget.statisticCounters')
			</div>
		</div>
		<div class="best-materials-item__descr">
			Где лучше учиться ездить? Дорога или трек?
		</div>
	</div>
	@endif

</a>
