@extends('layouts.main')

@section('content')
<div class="section">
	<div class="container">
		<div class="page-content-wrapper__content">
			<aside class="page-aside-block">
				@include('block.sideMenu')

				@include('block.asideMap')
			</aside>

			<div class="page-content">
				<div class="container container--no-gap">
					<div class="grid">
						<div class="gcell gcell--12 gcell--md-9 _p-ms _text-center _borderB1gr">
							<span class="title title--dark title--light title--ms">Создание записи бортжурнала</span>
						</div>
						<div class="gcell gcell--12 gcell--md-3 _p-ms _lGrey3-bg _border1gr _borderB0 _text-center">
							<span class="title title--dark title--light title--sm">Создать запись</span>
						</div>
					</div>

					<div class="grid grid--vspace-xl grid--md-vspace-none grid--md-hspace-xl _lGrey3-bg _plr-xl _ptb-def _flex _items-center _borderLR1gr _ml-none">
						<div class="gcell gcell--12 gcell--md-4 _pl-none">
							<div class="select-wrapper select-wrapper--lgs select-wrapper--type-2">
								<select class="js-choice-select">
									<option placeholder>выберите категорию</option>
									<option value="1">категория раз</option>
									<option value="2">категория два</option>
									<option value="3">категория три</option>
								</select>
							</div>
						</div>
						<div class="gcell gcell--12 gcell--md-8">
							<div class="form-item _w100">
								<input type="text" value="" class="form-input form-input--lg" name="" id="">
							</div>
						</div>
					</div>

					<div class="grid grid--vspace-xl grid--md-vspace-none _borderTBD1gr _borderLR1gr _ptb-def _plr-xl _lGrey-bg _ml-none">
						<div class="gcell gcell--12 _md-mb-def">
							<div class="checkbox-alerts checkbox-alerts--default paper-button paper-button--hover">
								<input class="checkbox-alerts__input" type="checkbox" name="" id="public-as-article">
								<label class="checkbox-alerts__label" for="public-as-article">
									<div class="checkbox-alerts__icon">
										@svg('okay')
									</div>
									<span>Опубликовать статью</span>
								</label>
							</div>
						</div>
						<div class="gcell gcell--12 gcell--md-4 _md-pr-xl">
							<div class="form-item _w100">
								<input type="text" value="" class="form-input form-input--ms" name="" id="">
							</div>
						</div>
						<div class="gcell gcell--12 gcell--md-4 _md-pr-xl">
							<div class="form-item _w100">
								<input type="text" value="" class="form-input form-input--ms" name="" id="">
							</div>
						</div>
						<div class="gcell gcell--12 gcell--md-4">
							<div class="select-wrapper select-wrapper--lgs select-wrapper--type-2">
								<select class="js-choice-select">
									<option placeholder>о чем статья</option>
									<option value="1">тема 1</option>
									<option value="2">тема 2</option>
									<option value="3">тема 3</option>
								</select>
							</div>
						</div>
					</div>

					<div class="grid grid--1 _lGrey3-bg _borderB1gr _borderLR1gr">
						<div class="gcell _flex _justify-center _md-justify-start _md-pl-xl _pt-def _mb-ms">
							@include('block.dlPhotoItem', ['downloadCover' => ''])
						</div>
						<div class="gcell _mb-ms">
							@include('widget.newTextarea', ['cls' => 'new-textarea--normal'])
						</div>
						<div class="gcell _pl-ms _pb-def _mb-xl">
							@include('block.createActions', ['chart' => ''])
						</div>
						<div class="gcell _flex _justify-center _md-justify-end _mb-xl _md-pr-xl">
							<button class="button button--empty _mr-def">
								<div class="button__content">
									<span class="button__text">
										Отмена
									</span>
								</div>
							</button>
							<button class="button button--def button--llGrey paper-button paper-button--hover" data-ripple-color="#b7b7b7">
								<div class="button__content">
									<span class="button__text">
										Создать
									</span>
								</div>
							</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
