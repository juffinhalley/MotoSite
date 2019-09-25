<?php
	$person = [
		[
			"rate" => "",
			"date" => "",
			"anotherPlaces" => ""
		]
	];
	$place = [
		[
			"date" => "",
			"buttonNone" => "",
			"cls" => "person-item--border-none",
			"name" => $item['personName']
		]
	]
?>
<div class="place-top">
	<div class="place-top__left-col">
		<div class="place-top__title">
			{{ $item['title'] }}
		</div>

		<div class="place-top__info">
			@foreach ($arrInfo as $info)
			<div class="place-top__info-item">
				<span class="place-top__info-type">
					{{ $info['infoType'] }}
				</span>

				@if (isset($info['infoRate']))
				<span class="place-top__info-rate">
					@for ($i=0; $i < $info['infoRate']; $i++)
						@svg('star')
					@endfor
				</span>
				@endif

				<span class="place-top__info-value">
					{{ $info['infoValue'] }}
				</span>
			</div>
			@endforeach
		</div>

		@if (isset($item['creator']))
			<div class="place-top__creator">
				@if ($item['creator'] == 'user')
					@foreach ($person as $itemPerson)
						@include('block.person', $itemPerson)
					@endforeach
				@elseif ($item['creator'] == 'place')
					@foreach ($place as $itemPerson)
						@include('block.person', $itemPerson)
					@endforeach
				@endif

			</div>
		@endif

		@if (isset($item['feedback']))
			<div class="place-top__fb">
				<div class="place-top__fb-button">
					<button class="button button--type-3 button--mdst paper-button paper-button--hover">
						<div class="button__content">
							<span class="button__text">Обратная связь</span>
							<span class="button__icon">
								@svg('arrowBottom')
							</span>
						</div>
					</button>
				</div>
				<div class="place-top__fb-cont">
					<div class="place-top__fb-cont-top">
						Обратная связь
						@svg('arrowTop')
					</div>
					<div class="place-top__fb-cont-bottom">
						<div class="place-top__fb-cont-bottom-left">
							<div class="place-top__fb-cont-tel" title="+380 (95) 44-37-114">
								+380 (95) 44-37-114
							</div>
						</div>
						<div class="place-top__fb-cont-button">
							<button class="button button--type-orange button--smx paper-button paper-button--hover">
								<div class="button__content">
									Написать
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
		@endif

		@if (isset($item['contacts']))
			<div class="place-top__contacts">
				<div class="place-top__contacts-button">
					<button class="button button--type-3 button--def paper-button paper-button--hover">
						<div class="button__content">
							<span class="button__text">Контактная информация</span>
							<span class="button__icon">
								@svg('arrowBottom')
							</span>
						</div>
					</button>
				</div>
				<div class="place-top__contacts-cont">
					<div class="place-top__contacts-cont-top">
						<span>Контактная информация</span>
						@svg('arrowTop')
					</div>
					<div class="place-top__contacts-cont-bottom">
						<span>+380 (95) 44-37-114</span>
						<span>+380 (66) 44-37-114</span>
					</div>
				</div>
			</div>
		@endif

		@if (isset($item['buttons']))
			<div class="place-top__buttons">
				<button class="button paper-button paper-button--hover button--default button--lgmd" data-ripple-color="#b7b7b7">
					<div class="button__content">
						<span class="button__text">{{ isset($item['self']) ? 'Редактировать' : 'Нравится' }}</span>
					</div>
				</button>
				<button class="button paper-button paper-button--hover button--default button--lgmd" data-ripple-color="#b7b7b7">
					<div class="button__content">
						<span class="button__text">Комментировать</span>
					</div>
				</button>
			</div>
		@endif
	</div>

	<div class="place-top__right-col">
		<a href="#" class="place-top__map" alt="">
			<img src="{{ URL::asset('images/map_places.jpg') }}" alt="">
		</a>
		<a href="#" class="place-top__map-geo">
			@svg('marker')
			<span>Херсон, Берриславское шоссе 47, UA</span>
		</a>
	</div>

</div>
