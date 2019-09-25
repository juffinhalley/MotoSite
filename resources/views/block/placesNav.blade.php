<div class="places-nav {{ isset($item['withMenu']) ? 'places-nav--with-menu' : '' }}" data-switch>

	<div class="grid grid--vspace-ms grid--md-vspace-none _flex _flex-column _items-center _md-flex-row">
		<div class="gcell">
			<div data-mfp-src="#places-menu-popup" class="places-nav__selected-tab popup-default {{ $item['tab-active'] == 'places' ? ' is-active' : ''}}">
				{{ $item['typeOfPlaces'] }}
				<div class="places-nav__selected-tab-icon">
					@svg('needMoreIcons')
				</div>
			</div>
		</div>
		<div class="gcell">
			<div class="places-nav__my-places-tab {{ $item['tab-active'] == 'my-places' ? ' is-active' : ''}}">
				<span>Мои места</span>
				@svg('marker')
			</div>
		</div>
		<div class="gcell _md-ml-auto">
			<button class="button button--lgs button--type-3 paper-button paper-button--hover">
				<div class="button__content">
					Создать место
				</div>
			</button>
		</div>
	</div>

	<div class="places-nav__bottom-row">
		<div class="grid grid--vspace-ms grid--md-vspace-none grid--md-hspace-xl _flex _flex-column _md-flex-row _items-center">
			<div class="gcell {{ isset($item['withMenu']) ? 'gcell--md-5' : 'gcell--md-3' }}">
				<div class="select-wrapper select-wrapper--mds select-wrapper--type-2">
					<select class="js-choice-select">
						<option selected value="1">по рейтингу</option>
						<option value="3">по прибыванию</option>
						<option value="2">по отбыванию</option>
						<option value="4">по отбытию</option>
					</select>
				</div>
			</div>
			<div class="gcell {{ isset($item['withMenu']) ? 'gcell--md-2' : 'gcell--md-6' }}">
				@if (!isset($item['withMenu']))
					<form class="js-form _w100" action="" method="post" data-ajax="./hidden/response/demo.json">
						<div class="form-item form-item--decor-t2">
							<span class="form-item__decor">
								@svg('search')
							</span>

							<input value="" required placeholder="Поиск по имени создателя" type="text" id="search" name="search" class="form-input form-input--ms">
						</div>
					</form>
				@endif
			</div>
			<div class="gcell {{ isset($item['withMenu']) ? 'gcell--md-5' : 'gcell--md-3' }} _flex _justify-center _md-justify-end">
				<div class="places-nav__numb-of-places">
					<span> {{ $item['numbOfPlaces'] }} </span>
					{{ $item['sortOfPlaces']}}
				</div>
			</div>
		</div>

		@if (isset($item['withMenu']))
			<div class="places-nav__button-open-menu is-active" data-btn-on>
				@svg('plus')
				<div class="places-nav__triangle-open-menu"></div>
			</div>
			<div class="places-nav__button-close-menu" data-btn-off>
				@svg('minus')
				<div class="places-nav__triangle-open-menu"></div>
			</div>
		@endif

	</div>

	@if (isset($item['withMenu']))
		<div class="places-nav__opened-sort" data-switch-cont>
			<div class="grid grid--hspace-xl grid--vspace-def">
				<div class="gcell gcell--12 gcell--md-3">
					<div class="form-item form-item--wiconr">
						<input type="text" placeholder="страна" value="Украина, UA" class="form-input form-input--sm" id="js-form-country" name="" data-error-text="Выберите страну">
						<label for="js-form-country" class="form-icon form-icon--sm">
							@svg('marker')
						</label>
					</div>
				</div>
				<div class="gcell gcell--12 gcell--md-3">
					<div class="form-item form-item--wiconr">
						<input type="text" placeholder="регион" class="form-input form-input--sm" id="js-form-region" name="" data-error-text="Выберите регион">
						<label for="js-form-region" class="form-icon form-icon--sm">
							@svg('marker')
						</label>
					</div>
				</div>
				<div class="gcell gcell--12 gcell--md-3">
					<div class="form-item form-item--wiconr">
						<input type="text" placeholder="город" class="form-input form-input--sm" id="js-form-city" name="" data-error-text="Выберите город">
						<label for="js-form-city" class="form-icon form-icon--sm">
							@svg('marker')
						</label>
					</div>
				</div>
				<div class="gcell gcell--md-3"></div>
				<div class="gcell gcell--12 gcell--md-6">
					<form class="js-form _w100" action="" method="post" data-ajax="./hidden/response/demo.json">
						<div class="form-item form-item--decor-t2">
							<span class="form-item__decor">
								@svg('search')
							</span>

							<input value="" required placeholder="Поиск по тегам" type="text" id="search" name="search" class="form-input form-input--ms">
						</div>
					</form>
				</div>
			</div>
		</div>
	@endif

</div>

@include('block.popups.placeMenu')
