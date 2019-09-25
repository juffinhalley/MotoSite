@if ($type == 'topMoto')
<div class="grid grid--1 grid--md-4 grid--md-hspace-ms grid--vspace-md grid--md-vspace-none _ptb-sm _plr-ms _lGrey-bg _mb-md _md-mb-lg">
	<div class="gcell _flex _justify-center _items-center _md-justify-start">
		<div class="select-wrapper select-wrapper--md select-wrapper--type-2">
			<select class="js-choice-select">
				<option selected value="1">по убыванию</option>
				<option value="3">по прибыванию</option>
				<option value="2">по отбыванию</option>
				<option value="4">по отбытию</option>
			</select>
		</div>
	</div>
	<div class="gcell _flex _justify-center _items-center _md-justify-start">
		<div class="select-wrapper select-wrapper--md select-wrapper--type-2">
			<select class="js-choice-select">
				<option placeholder>марка</option>
				<option value="1">BMW</option>
				<option value="2">Honda</option>
				<option value="3">Suzuki</option>
			</select>
		</div>
	</div>
	<div class="gcell _flex _justify-center _items-center _md-justify-start">
		<div class="select-wrapper select-wrapper--md select-wrapper--type-2">
			<select class="js-choice-select">
				<option placeholder>модель</option>
				<option value="1">VS-1</option>
				<option value="2">VHS-1</option>
				<option value="3">UVHS-1</option>
			</select>
		</div>
	</div>
	<div class="gcell _flex _justify-center _items-center _md-justify-end _items-center">
		<div class="text text--def text--grey">
			<span>1478 </span> мотоциклов
		</div>
	</div>
</div>

@elseif ($type == 'topPhoto')
<div class="grid grid--hspace-ms grid--vspace-ms grid--md-vspace-none _flex _justify-between _ptb-sm _plr-ms _lGrey-bg _mb-md _md-mb-lg">
	<div class="gcell gcell--12 gcell--md-3 _flex _justify-center _items-center _md-justify-start _flex-order-1 _md-flex-order-0">
		<div class="select-wrapper select-wrapper--md select-wrapper--type-2">
			<select class="js-choice-select">
				<option selected value="1">по убыванию</option>
				<option value="3">по прибыванию</option>
				<option value="2">по отбыванию</option>
				<option value="4">по отбытию</option>
			</select>
		</div>
	</div>
	<div class="gcell gcell--12 gcell--md-6 _flex _justify-center _items-center _md-justify-start">
		<form class="js-form _w100" action="" method="post" data-ajax="./hidden/response/demo.json">
			<div class="form-item form-item--decor-t2">
				<span class="form-item__decor">
					@svg('search')
				</span>

				<input value="" required placeholder="Поиск по тегам" type="text" id="search" name="search" class="form-input form-input--ms">
			</div>
		</form>
	</div>
	<div class="gcell gcell--12 gcell--md-3 _flex _flex _justify-center _items-center _md-justify-end _items-center _flex-order-1 _md-flex-order-0">
		<div class="text text--def text--grey"><span>147805 </span> фотографий</div>
	</div>
</div>

@elseif ($type == 'topUser')
<div class="grid grid--hspace-ms grid--vspace-ms grid--md-vspace-none _flex _justify-between _ptb-sm _plr-ms _lGrey-bg _mb-md _md-mb-lg">
	<div class="gcell gcell--12 gcell--md-3 _flex _justify-center _items-center _md-justify-start _flex-order-1 _md-flex-order-0">
		<div class="select-wrapper select-wrapper--md select-wrapper--type-2">
			<select class="js-choice-select">
				<option selected value="1">по убыванию</option>
				<option value="3">по прибыванию</option>
				<option value="2">по отбыванию</option>
				<option value="4">по отбытию</option>
			</select>
		</div>
	</div>
	<div class="gcell gcell--12 gcell--md-6 _flex _justify-center _items-center _md-justify-start">
		<form class="js-form _w100" action="" method="post" data-ajax="./hidden/response/demo.json">
			<div class="form-item form-item--decor-t2">
				<span class="form-item__decor">
					@svg('search')
				</span>

				<input value="" required placeholder="Поиск по пользователям" type="text" id="search" name="search" class="form-input form-input--ms">
			</div>
		</form>
	</div>
	<div class="gcell gcell--12 gcell--md-3 _flex _justify-center _items-center _md-justify-end _items-center _flex-order-1 _md-flex-order-0">
		<div class="text text--def text--grey"><span>24700 </span> пользователей</div>
	</div>
</div>

@elseif ($type == 'topVideo')
<div class="grid grid--hspace-ms grid--vspace-ms grid--md-vspace-none _flex _justify-between _ptb-sm _plr-ms _lGrey-bg _mb-md _md-mb-lg">
	<div class="gcell gcell--12 gcell--md-3 _md-mr-auto _flex _justify-center _items-center _md-justify-start">
		<div class="select-wrapper select-wrapper--md select-wrapper--type-2">
			<select class="js-choice-select">
				<option selected value="1">по убыванию</option>
				<option value="3">по прибыванию</option>
				<option value="2">по отбыванию</option>
				<option value="4">по отбытию</option>
			</select>
		</div>
	</div>
	<div class="gcell gcell--12 gcell--md-3 _flex _justify-center _items-center _md-justify-end _items-center">
		<div class="text text--def text--grey"><span>14780 </span> видеозаписей</div>
	</div>
</div>

@endif
