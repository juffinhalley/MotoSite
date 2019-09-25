@if ($item['typeItem'] == "motorcycles")
<a href="#" class="top-item">
	<div class="top-item__wrapper">
		<div class="top-item__decore"></div>
		<div class="top-item__image">
			<img src="{{ URL::asset('images/slide_image_255x160.jpg') }}" alt="" title="">
			<div class="top-item__hover-counters">
				@include('widget.statisticCounters')
			</div>
			<div class="top-item__top">
				@svg('star')
				<span>{{ $item['top'] }}</span>
			</div>
			<div class="top-item__battles">
				@svg('battle')
				<span>7</span>
			</div>
			<div class="top-item__hover-title">
				<span class="top-item__hover-text">
					Смотреть
				</span>
				<span class="top-item__hover-arrow"></span>
			</div>
		</div>
		<div class="top-item__descr">
			{{ $item['text'] }}
		</div>
	</div>
</a>

@elseif ($item['typeItem'] == "events")
<a href="#" class="top-item top-item--hov-count-top">
	<div class="top-item__wrapper">
		<div class="top-item__decore"></div>
		<div class="top-item__image">
			<img src="{{ URL::asset('images/slide_image_events_255x160.jpg') }}" alt="" title="">
			<div class="top-item__hover-counters">
				@include('widget.statisticCounters', ["typeOfCounters" => "ehc"])
			</div>
			<div class="top-item__rate">
				@svg('star')
				<span> {{ $item['top'] }} </span>
				из 5
			</div>
			<div class="top-item__hover-title">
				<span class="top-item__hover-text">
					Смотреть
				</span>
				<span class="top-item__hover-arrow"></span>
			</div>
		</div>
		<div class="top-item__descr">
			{{ $item['text'] }}
		</div>
	</div>
</a>

@elseif ($item['typeItem'] == "places")
<a href="#" class="top-item top-item--hov-count-top">
	<div class="top-item__wrapper">
		<div class="top-item__decore"></div>
		<div class="top-item__image">
			<img src="{{ URL::asset('images/slide_image_places_255x160.jpg') }}" alt="" title="">
			<div class="top-item__hover-counters">
				@include('widget.statisticCounters', ["typeOfCounters" => "ehc"])
			</div>
			<div class="top-item__rate">
				@svg('star')
				<span> {{ $item['top'] }} </span>
				из 5
			</div>
			<div class="top-item__hover-title">
				<span class="top-item__hover-text">
					Смотреть
				</span>
				<span class="top-item__hover-arrow"></span>
			</div>
		</div>
		<div class="top-item__descr">
			{{ $item['text'] }}
		</div>
	</div>
</a>

@elseif ($item['typeItem'] == "motoTop")
<a href="#" class="top-item top-item--moto-top
{{ isset($item['tightDescr']) ? ' top-item--tight-descr' : '' }}
{{ isset($item['withoutTop']) ? ' top-item--without-top' : '' }}
{{ isset($item['withoutTrophy']) ? ' top-item--without-trophy' : '' }}">
	<div class="top-item__wrapper">
		<div class="top-item__decore"></div>
		<div class="top-item__image">
			<img src="{{ URL::asset('images/'.$item['image']) }}" alt="" title="">
			<div class="top-item__hover-counters">
				@include('widget.statisticCounters', ["typeOfCounters" => "ehc"])
			</div>
			<div class="top-item__trophy">
				@include('widget.statisticCounters', ["typeOfCounters" => "t"])
			</div>
			<div class="top-item__top">
				@svg('star')
				<span> {{ $item['top'] }} </span>
			</div>
		</div>
		<div class="top-item__descr">
			{{ $item['text'] }}
		</div>
	</div>
</a>

@elseif ($item['typeItem'] == "photoTop")
<a href="#" class="top-item top-item--photo-top">
	<div class="top-item__wrapper">
		<div class="top-item__decore"></div>
		<div class="top-item__image">
			<img src="{{ URL::asset('images/'.$item['image']) }}" alt="" title="">
			<div class="top-item__hover-counters">
				@include('widget.statisticCounters', ["typeOfCounters" => "ehc"])
			</div>
			<div class="top-item__top">
				@svg('star')
				<span> {{ $item['top'] }} </span>
			</div>
			<div class="top-item__name">
				Мой новый мотоцикл
			</div>
			<div class="top-item__like">
				@svg('heart')
				Нравится
			</div>
		</div>
	</div>
</a>

@elseif ($item['typeItem'] == "videoTop")
<a href="#" class="top-item top-item--video-top">
	<div class="top-item__wrapper">
		<div class="top-item__decore">
			@svg('play')
		</div>
		<div class="top-item__image">
			<img src="{{ URL::asset('images/'.$item['image']) }}" alt="" title="">
			<div class="top-item__hover-counters">
				@include('widget.statisticCounters', ["typeOfCounters" => "ehc"])
			</div>
			<div class="top-item__top">
				@svg('star')
				<span> {{ $item['top'] }} </span>
			</div>
			<div class="top-item__name">
				Мой новый мотоцикл
			</div>
		</div>
	</div>
</a>

@endif
