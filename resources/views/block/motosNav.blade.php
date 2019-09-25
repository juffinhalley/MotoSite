<div class="motos-nav {{ isset($item['withMenu']) ? 'motos-nav--with-menu' : '' }}" data-switch>

	<div class="motos-nav__top-row">
		<div class="grid grid--1 grid--sm-2 _flex _items-center _justify-between">
			<div class="gcell _flex _justify-center _sm-justify-start _mb-ms _sm-mb-none">
				<div class="select-wrapper select-wrapper--mds select-wrapper--type-2">
					<select class="js-choice-select">
						<option selected value="1">по дате</option>
						<option value="3">по прибыванию</option>
						<option value="2">по отбыванию</option>
						<option value="4">по отбытию</option>
					</select>
				</div>
			</div>
			<div class="gcell _flex _justify-center _ms-justify-end">
				<div class="motos-nav__numb-of-motos">
					<span> {{ $item['numbOfMotos'] }} </span>
					мотоциклов
				</div>
			</div>
		</div>

		@if (isset($item['withMenu']))
		<div class="motos-nav__button-open-menu is-active" data-btn-on>
			@svg('plus')
			<div class="motos-nav__triangle-open-menu"></div>
		</div>
		<div class="motos-nav__button-close-menu" data-btn-off>
			@svg('minus')
			<div class="motos-nav__triangle-open-menu"></div>
		</div>
		@endif
	</div>

	@if (isset($item['withMenu']))
	<div class="motos-nav__opened-sort" data-switch-cont>
		<div class="grid _flex _flex-column _sm-flex-row _items-center grid--vspace-def">
			<div class="gcell _flex _justify-center _ms-justify-start _sm-mr-xl">
				<div class="select-wrapper select-wrapper--mds select-wrapper--type-2">
					<select class="js-choice-select">
						<option placeholder value="1">вид мотоцикла</option>
						<option value="3">Чоппер</option>
						<option value="2">Спорт</option>
						<option value="4">Сити</option>
					</select>
				</div>
			</div>
			<div class="gcell _sm-mr-md">
				<span class="text text--def text--dark">Год выпуска:</span>
			</div>
			<div class="gcell _sm-mr-md">
				<div class="select-wrapper select-wrapper--smms select-wrapper--type-2">
					<select class="js-choice-select">
						<option placeholder value="1">c</option>
						<option value="3">1990</option>
						<option value="2">2000</option>
						<option value="4">2010</option>
					</select>
				</div>
			</div>
			<div class="gcell _sm-mr-md">
				<span class="text text--def text--dark">-</span>
			</div>
			<div class="gcell">
				<div class="select-wrapper select-wrapper--smms select-wrapper--type-2">
					<select class="js-choice-select">
						<option placeholder value="1">по</option>
						<option value="3">1990</option>
						<option value="2">2000</option>
						<option value="4">2010</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>
