@if (isset($cover))

<div class="dl-photo-item dl-photo-item--cover">
	<div class="dl-photo-item__image">
		<img src="{{ URL::asset('images/dl_photo_item_180x121.jpg') }}" alt="">
	</div>
	<div class="dl-photo-item__cover">
		@svg('star')
	</div>
	<a href="#" class="dl-photo-item__delete">
		@svg('cross')
	</a>
	<div class="dl-photo-item__descr">
		<div class="dl-photo-item__descr-content">
			<div class="checkbox-alerts checkbox-alerts--default _mr-ms">
				<input class="checkbox-alerts__input" type="checkbox" id="{{ $item['id'] }}">
				<label class="checkbox-alerts__label" for="{{ $item['id'] }}">
					<div class="checkbox-alerts__icon">
						@svg('okay')
					</div>
				</label>
			</div>
			Описание
		</div>
	</div>
</div>

@elseif (isset($download))

	<a href="#" class="dl-photo-item__download">
		<div class="dl-photo-item__download-title">
			@svg('photoAdd')
			<span>Загрузить обложку</span>
		</div>
	</a>

@elseif (isset($downloadCover))

	<a href="#" class="dl-photo-item__download">
		<div class="dl-photo-item__download-title">
			@svg('photoAdd')
			<span>Загрузить обложку</span>
		</div>
		<div class="dl-photo-item__download-decore">
			@svg('starRound')
		</div>
	</a>

@elseif (isset($albumCover))

<a href="#" class="dl-photo-item dl-photo-item--album-cover">
	<div class="dl-photo-item__image">
		<img src="{{ URL::asset('images/dl_photo_item_245x160.jpg') }}" alt="">
	</div>
	<div class="dl-photo-item__descr">
		<div class="dl-photo-item__descr-top">
			А мы всё о том же и говорим
		</div>
		<div class="dl-photo-item__descr-counters">
			@include('widget.statisticCounters', ["typeOfCounters" => 'teh'])
		</div>
	</div>
</a>

@elseif (isset($pick))

<div class="dl-photo-item dl-photo-item--pick">
	<div class="dl-photo-item__image">
		<img src="{{ URL::asset('images/dl_photo_item_180x121.jpg') }}" alt="">
	</div>
	<div class="dl-photo-item__checkbox">
		<div class="checkbox-alerts checkbox-alerts--type2 checkbox-alerts--imd">
			<input class="checkbox-alerts__input" type="checkbox" name="" id="{{ $item['id'] }}">
			<label class="checkbox-alerts__label" for="{{ $item['id'] }}">
				<div class="checkbox-alerts__icon">
					@svg('okay')
				</div>
			</label>
		</div>
	</div>
	<div class="dl-photo-item__descr">
		<div class="dl-photo-item__descr-counters">
			@include('widget.statisticCounters', ["typeOfCounters" => 'eh'])
		</div>
	</div>
</div>

@else

<div class="dl-photo-item">
	<div class="dl-photo-item__image">
		<img src="{{ URL::asset('images/dl_photo_item_180x121.jpg') }}" alt="">
	</div>
	<a href="#" class="dl-photo-item__delete">
		@svg('cross')
	</a>
	<div class="dl-photo-item__descr">
		<div class="dl-photo-item__descr-content">
			<div class="checkbox-alerts checkbox-alerts--default _mr-ms">
				<input class="checkbox-alerts__input" type="checkbox" id="{{ $item['id'] }}">
				<label class="checkbox-alerts__label" for="{{ $item['id'] }}">
					<div class="checkbox-alerts__icon">
						@svg('okay')
					</div>
				</label>
			</div>
			Описание
		</div>
	</div>
</div>

@endif
