<div class="grid grid--vspace-md grid--md-vspace-none _ptb-sm _plr-ms _lGrey-bg _mb-sm _md-mb-none">
	<div class="gcell gcell--12 gcell--md-auto _flex _justify-center _items-center _md-justify-start _md-mr-xl">
		<div class="select-wrapper select-wrapper--mds select-wrapper--type-2">
			<select class="js-choice-select">
				<option selected value="1">по дате</option>
				<option value="3">по релевантности</option>
				<option value="2">по рейтингу</option>
				<option value="4">по чему-нибудь</option>
			</select>
		</div>
	</div>
	<div class="gcell gcell--12 gcell--md-auto _flex _justify-center _items-center _md-justify-start">
		<div class="select-wrapper select-wrapper--mds select-wrapper--type-2">
			<select class="js-choice-select">
				<option placeholder>отображать по 15</option>
				<option value="1">отображать по 15</option>
				<option value="2">отображать по 15</option>
				<option value="3">отображать по 15</option>
			</select>
		</div>
	</div>
	<div class="gcell gcell--12 gcell--md-4 _flex _justify-center _items-center _md-justify-end _items-center _md-ml-auto">
		<div class="text text--def text--grey">
			<span>48 </span> баттлов
		</div>
	</div>
</div>
<div class="grid grid--1 grid--md-3">
	<div class="gcell _border1lgr">
		<a href="#" class="link link--def link--grey link--hdark _flex _justify-center _items-center _w100 _ptb-md _hBgLgr {{ isset($wins) ? '_tab-active' : '' }}">
			Победы
		</a>
	</div>
	<div class="gcell _border1lgr">
		<a href="#" class="link link--def link--grey link--hdark _flex _justify-center _items-center _w100 _ptb-md _hBgLgr">
			Ничьи
		</a>
	</div>
	<div class="gcell _border1lgr">
		<a href="#" class="link link--def link--grey link--hdark _flex _justify-center _items-center _w100 _ptb-md _hBgLgr">
			Поражения
		</a>
	</div>
</div>
