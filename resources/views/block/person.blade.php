@if (isset($itemPerson['userFilter']))
	<a href="#" class="person-item {{ isset($itemPerson['anotherPlaces']) ? 'person-item--another-places' : '' }} {{ isset($itemPerson['cls']) ? $itemPerson['cls'] : '' }}">
@else
	<div class="person-item {{ isset($itemPerson['anotherPlaces']) ? 'person-item--another-places' : '' }} {{ isset($itemPerson['cls']) ? $itemPerson['cls'] : '' }}">
@endif

	@if (isset($itemPerson['top']))
	<div class="person-item__top" title="1">
		@svg('needMoreIcons')
		<span>
			1
		</span>
	</div>
	@elseif (isset($itemPerson['rate']))
		<div class="person-item__rate" title="+1347">
			+1347
		</div>
	@endif

	@if (isset($itemPerson['userFilter']))
		<div class="person-item__image">
			<img src="{{ URL::asset('images/person_90x90.jpg') }}" alt="" title="">
		</div>
	@else
		<a href='#' class="person-item__image">
			<img src="{{ URL::asset('images/person_90x90.jpg') }}" alt="" title="">
		</a>
	@endif

	<div class="person-item__content">
		@if (isset($itemPerson['name']))
			<a href='#' class="person-item__name" title="{{ $itemPerson['name'] }}">
				{{ $itemPerson['name'] }}
			</a>
		@elseif (isset($itemPerson['userFilter']))
			<div class="person-item__name" title="Костя Херсонский">
				Костя Херсонский
			</div>
		@else
			<a href='#' class="person-item__name" title="Костя Херсонский">
				Костя Херсонский
			</a>
		@endif


		@if (isset($itemPerson['date']))
			<div class="person-item__date">
				С нами с <span>27.05.2017</span>
			</div>
		@elseif(isset($itemPerson['userFilter']))
			<div class="person-item__place" title="Херсон,UA">
				@svg('marker')
				<span>
					Херсон,UA
				</span>
			</div>
		@else
			<a href="#" class="person-item__place" title="Херсон,UA">
				@svg('marker')
				<span>
					Херсон,UA
				</span>
			</a>
		@endif

		<div class="person-item__button">
			@if (isset($itemPerson['anotherPlaces']))
				<a href="#" class="button paper-button paper-button--hover button--defgr button--mdk">
					<div class="button__content">
						<span class="button__text text text__def">Другие места</span>
						<span class="button__icon">
							@svg('arrowFullRight')</span>
					</div>
				</a>
			@elseif (isset($itemPerson['buttonNone']))
			@else
				<a href='#' class="button button--type-3 paper-button paper-button--hover button--md" data-ripple-color="#b7b7b7">
					<div class="button__content">
						<span class="button__text">Смотреть профиль</span>
					</div>
				</a>
			@endif
		</div>
	</div>
@if (isset($itemPerson['userFilter']))
</a>
@else
</div>
@endif
