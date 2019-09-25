<div class="user-filter-bottom {{ isset($users) ? 'user-filter-bottom--users' : ''}}">
	<div class="user-filter-bottom__top">
		<div class="grid">
			<div class="gcell gcell--12 gcel--psh-6 _mb-ms _mb-psh-none">
				<form class="js-form _w100" action="" method="post" data-ajax="./hidden/response/demo.json">
					<div class="form-item form-item--decor-t2">
						<span class="form-item__decor">
							@svg('search')
						</span>
						@if (isset($filterSearch))
							<input value="Александр" type="text" id="search" name="search" class="form-input form-input--msx">
						@else
							<input value="" placeholder="Поиск по пользователям" type="text" id="search" name="search" class="form-input form-input--msx">
						@endif
					</div>
				</form>
			</div>
			<div class="gcell gcell--psh-2"></div>
			<div class="gcell gcell--12 gcell--psh-4">
				<div class="user-filter-bottom__users">
					<span>24700 </span>
					<span>пользователей</span>
				</div>
			</div>
		</div>
		<div class="user-filter-bottom__triangle"></div>
	</div>
	<div class="user-filter-bottom__bottom">
		<div class="user-filter-bottom__left-col">
			<div class="user-filter-bottom__user-items">
				@if (isset($users))
					<div class="grid grid--1 grid--sm-2 grid--psh-3 grid--vspace-xl">
						@for ($i=0; $i < 9; $i++)
							<div class="gcell">
								@include('block.person')
							</div>
						@endfor
					</div>
				@else
					<div class="grid grid--1">
						@for ($i=0; $i < 4; $i++)
							<div class="gcell _flex _justify-center _psh-justify-start _mb-def">
								@include('block.ownerItem', ['userFilter' => ''])
							</div>
						@endfor
					</div>
				@endif
			</div>
			<div class="user-filter-bottom__filter-showmore">
				<button class="button paper-button paper-button--hover button--showmore button--mds button--sb-content js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
					<div class="button__content">
						<span class="button__text">Показать ещё 15</span>
						<span class="button__icon">
							@svg('arrowBottom')
						</span>
					</div>
					<div class="paper-ripple">
						<div class="paper-ripple__background"></div>
						<div class="paper-ripple__waves"></div>
					</div>
				</button>
			</div>
		</div>
		<div class="user-filter-bottom__menu">
			<div class="grid grid--1">
				<div class="gcell _mb-xl">
					<div class="select-wrapper  select-wrapper--type-2">
						<select class="js-choice-select">
							<option selected value="1">по рейтингу</option>
							<option value="3">по прибыванию</option>
							<option value="2">по отбыванию</option>
							<option value="4">по отбытию</option>
						</select>
					</div>
				</div>
				<div class="gcell _mb-sm">
					<span class="text text--def text--dark">Регион:</span>
				</div>
				<div class="gcell _mb-def">
					<div class="select-wrapper  select-wrapper--type-2">
						<select class="js-choice-select">
							<option selected value="1">Украина</option>
							<option value="3">Польша</option>
							<option value="2">Молдова</option>
							<option value="4">Эстония</option>
						</select>
					</div>
				</div>
				<div class="gcell _mb-xl">
					<div class="select-wrapper  select-wrapper--type-2">
						<select class="js-choice-select">
							<option placeholder>выберите область</option>
							<option value="1">первая область</option>
							<option value="2">вторая область</option>
							<option value="3">третья область</option>
						</select>
					</div>
				</div>
				<div class="gcell _mb-sm">
					<span class="text text--def text--dark">Мотоклуб:</span>
				</div>
				<div class="gcell _mb-xl">
					<div class="select-wrapper  select-wrapper--type-2">
						<select class="js-choice-select">
							<option placeholder>любой</option>
							<option value="1">определенный</option>
							<option value="2">неопределенный</option>
							<option value="3">random</option>
						</select>
					</div>
				</div>
				<div class="gcell _mb-sm">
					<span class="text text--def text--dark">Мотоцикл:</span>
				</div>
				<div class="gcell _mb-xl">
					<div class="select-wrapper  select-wrapper--type-2">
						<select class="js-choice-select">
							<option placeholder>любой</option>
							<option value="1">определенный</option>
							<option value="2">неопределенный</option>
							<option value="3">random</option>
						</select>
					</div>
				</div>
				<div class="gcell _mb-sm">
					<span class="text text--def text--dark">Возраст:</span>
				</div>
				<div class="gcell _mb-xl">
					<div class="grid">
						<div class="gcell gcell--5">
							<div class="select-wrapper select-wrapper--type-2">
								<select class="js-choice-select">
									<option placeholder>от</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
						<div class="gcell gcell--2 _flex _justify-center _items-center">
							<hr class="_hr-dash">
						</div>
						<div class="gcell gcell--5">
							<div class="select-wrapper select-wrapper--type-2">
								<select class="js-choice-select">
									<option placeholder>до</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="gcell _mb-md">
					<span class="text text--def text--dark">Пол:</span>
				</div>
				<div class="gcell _mb-ms">
					<div class="checkbox-alerts checkbox-alerts--default paper-button paper-button--hover">
						<input class="checkbox-alerts__input" type="checkbox" name="user-filter-male" id="user-filter-male" checked>
						<label class="checkbox-alerts__label" for="user-filter-male">
							<div class="checkbox-alerts__icon">
								@svg('okay')
							</div>
							<span>Мужской</span>
						</label>
					</div>
				</div>
				<div class="gcell _mb-xl">
					<div class="checkbox-alerts checkbox-alerts--default paper-button paper-button--hover">
						<input class="checkbox-alerts__input" type="checkbox" name="user-filter-female" id="user-filter-female">
						<label class="checkbox-alerts__label" for="user-filter-female">
							<div class="checkbox-alerts__icon">
								@svg('okay')
							</div>
							<span>Женский</span>
						</label>
					</div>
				</div>
				<div class="gcell _mb-md">
					<span class="text text--def text--dark">Пол:</span>
				</div>
				<div class="gcell _mb-ms">
					<div class="checkbox-alerts checkbox-alerts--default paper-button paper-button--hover">
						<input class="checkbox-alerts__input" type="checkbox" name="user-filter-photo" id="user-filter-photo" checked>
						<label class="checkbox-alerts__label" for="user-filter-photo">
							<div class="checkbox-alerts__icon">
								@svg('okay')
							</div>
							<span>С фотографией</span>
						</label>
					</div>
				</div>
				<div class="gcell _mb-ms">
					<div class="checkbox-alerts checkbox-alerts--default paper-button paper-button--hover">
						<input class="checkbox-alerts__input" type="checkbox" name="user-filter-online" id="user-filter-online">
						<label class="checkbox-alerts__label" for="user-filter-online">
							<div class="checkbox-alerts__icon">
								@svg('okay')
							</div>
							<span>Сейчас на сайте</span>
						</label>
					</div>
				</div>
				<div class="gcell">
					<div class="checkbox-alerts checkbox-alerts--default paper-button paper-button--hover">
						<input class="checkbox-alerts__input" type="checkbox" name="user-filter-helper" id="user-filter-helper">
						<label class="checkbox-alerts__label" for="user-filter-helper">
							<div class="checkbox-alerts__icon">
								@svg('okay')
							</div>
							<span>Помощник в выборе</span>
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
