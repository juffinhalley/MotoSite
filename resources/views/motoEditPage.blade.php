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
				<form class="modal js-form _w100" method="post" data-ajax="./hidden/response/demo.json">
					<div class="grid grid--1">

						<div class="gcell gcell--12 gcell--psh-9 _borderB1gr _p-ms">
							<div class="title title--light title--ms title--dark _text-center">
								Редактирование страницы мотоцикла
							</div>
						</div>

						<div class="gcell gcell--12 gcell--psh-3 _p-ms _lGrey3-bg _border1gr _borderB0">
							<div class="title title--light title--sm title--dark _text-center">
								Редактировать мотоцикл
							</div>
						</div>
					</div>

					<div class="_lGrey3-bg _border1gr _borderT0  _plr-md _def-plr-xl _ptb-lg">

						<div class="grid _flex _flex-column _def-flex-row _items-center grid--def-hspace-def grid--vspace-ms grid--def-vspace-none _mb-xl">
							<div class="gcell gcell--def-3 _flex _justify-center _def-justify-start">
								<div class="form-item _w100">
									<div class="select-wrapper select-wrapper--mdm select-wrapper--grey select-wrapper--lGrey4">
										<select class="js-choice-select" data-select-search="false">
											<option value="0">Yamaha</option>
											<option value="1">Suzuki</option>
											<option value="2">BMW</option>
											<option value="3">Kawasaki</option>
										</select>
									</div>
								</div>
							</div>
							<div class="gcell gcell--def-3 _flex _justify-center _def-justify-start">
								<div class="form-item _w100">
									<div class="select-wrapper select-wrapper--mdm select-wrapper--grey select-wrapper--lGrey4">
										<select class="js-choice-select" data-select-search="false">
											<option value="0">YZF-R3A</option>
											<option value="1">GSX-S1000S Katana</option>
											<option value="2">G 310 GS</option>
											<option value="3">ZZR1400</option>
										</select>
									</div>
								</div>
							</div>
							<div class="gcell gcell--def-6 _flex _justify-center _def-justify-start _self-stretch">
								<div class="form-item _w100">
									<input type="text" value="&laquo;Thunder&raquo;" class="form-input form-input--lg" name="page-moto-name">
								</div>
							</div>
						</div>

						<div class="grid grid--vspace-ms grid--def-vspace-none _flex _flex-column _def-flex-row _items-center _flex-nowrap _mb-lg">
							<div class="gcell">
								<button class="button paper-button paper-button--hover button--facepalmwhite button--mg button--omgmr1" data-ripple-color="#b7b7b7">
									<div class="button__content">
										@svg("camera")
										<span class="button__text">Загрузить фото</span>
									</div>
								</button>
							</div>

							<div class="gcell _def-mr-auto">
								<div class="button-gag"
								style="
									display: flex;
									align-items: center;
									max-width: 100%;
									width: 240px;
									height: 40px;
									padding: 10px 15px;
									background-color: #e6e6e6;
								">
									<div class="checkbox-alerts__icon"
									style="
										background-color: #757575;
	    							border: 1px solid #757575;
	    							margin-right: 30px;
									">
										@svg('okay')
									</div>
									<span class="text text--def text--dark">Обложка загружена</span>
								</div>
								{{-- <button class="button paper-button paper-button--hover button--facepalmwhite button--mg button--omgmr1" data-ripple-color="#b7b7b7">
									<div class="button__content">
										@svg("camera")
										<span class="button__text">Загрузить обложку</span>
									</div>
								</button> --}}
							</div>

							<div class="gcell">
								<button type="button" class="button paper-button paper-button--hover button--facepalmwhite button--mg" data-ripple-color="#b7b7b7">
									<div class="button__content">
										<span class="button__text">Добавить марку и модель</span>
									</div>
								</button>
							</div>
						</div>

						<div class="grid grid--1 _mb-lg">
							<div class="gcell _mb-def ">
								<div class="title title--dark title--light title--sm _text-center _def-text-left">
									Паспортные данные:
								</div>
							</div>
							<div class="gcell">
								@include('block.motoPassport')
							</div>
						</div>

						<div class="grid grid--1 _mb-lg">
							<div class="gcell _mb-def">
								<div class="wrapper _text-center _def-text-left">
									<label for="moto-create-review" class="title title--dark title--light title--sm">
										Отзыв владельца:
									</label>
								</div>
							</div>
							<div class="gcell">
								<div class="form-item">
									<textarea data-rule-minlength="9" data-rule-maxLength="100" name="moto-create-review" id="moto-create-review" class="form-textarea" rows="9">О мотоцикле в целом: Мотоцикл очень крут. Покупался в салоне Yamaha в декабре 2016г. Таким образом, новая модель организационной деятельности играет важную роль в формировании экономической целесообразности принимаемых решений. Равным образом постоянный количественный рост и сфера нашей активности способствует повышению актуальности ключевых компонентов планируемого обновления. С другой стороны сложившаяся структура организации напрямую зависит от существующих финансовых и административных условий.</textarea>
								</div>
							</div>
						</div>

						<div class="grid grid--1 _mb-lg">
							<div class="gcell _mb-def">
								<div class="wrapper _text-center _def-text-left">
									<label class="text text--def text--dark" for="moto-create-tor">
										Теги для страницы:
									</label>
								</div>
							</div>
							<div class="gcell">
								<div class="form-item">
									<input type="text" id="moto-create-tor" class="form-input form-input--lg" name="moto-create-tor" placeholder="Напр.: обзор, мотоцикл, запчасти" required>
								</div>
							</div>
						</div>

						<div class="grid grid--1 _mb-def">
							<div class="gcell _mb-sm">
								<div class="title title--dark title--normal title--xs _text-center _def-text-left">
									Обложка:
								</div>
							</div>
							<div class="gcell _flex _justify-center _def-justify-start">
								<div class="logbook-record-preimg logbook-record-preimg--mgn">
									<img src="{{ URL::asset('images/logo_record_preimg_70x50.jpg') }}" alt="" title="">
									<div class="logbook-record-preimg__delete">
										@svg('cross')
									</div>
								</div>
							</div>
						</div>

						<div class="grid">
							<div class="gcell gcell--12 _mb-sm">
								<div class="title title--dark title--normal title--xs _text-center _def-text-left">
									Фотографии: <span class="text text--sm text--grey">загружено 10 фотографий</span>
								</div>
							</div>

							<div class="gcell gcell--12 gcell--def-8 _flex _justify-center _def-justify-start _items-center _def-items-start">
								<div class="grid _flex _justify-center _def-justify-start">
									@for ($i = 0; $i < 11; $i++) <div class="gcell _pr-ms _pb-ms">
										<div class="logbook-record-preimg logbook-record-preimg--mgn">
											<img src="{{ URL::asset('images/logo_record_preimg_70x50.jpg') }}" alt="" title="">
											<div class="logbook-record-preimg__delete">
												@svg('cross')
											</div>
										</div>
								</div>
								@endfor
							</div>
						</div>
					</div>


					<div class="grid _flex _flex-column-reverse _items-center _psh-flex-row _justify-center _psh-justify-end">
						<div class="gcell _mt-def _psh-mt-none _psh-pr-mg _flex _items-center">
							<button class="button button--empty">
								<div class="button__content">
									<span class="button__text">
										Отмена
									</span>
								</div>
							</button>
						</div>
						<div class="gcell">
							<button class="button button--def button--llGrey paper-button paper-button--hover" data-ripple-color="#b7b7b7">
								<div class="button__content">
									<span class="button__text">
										Сохранить
									</span>
								</div>
							</button>
						</div>
					</div>
					{{-- Close bg&borders --}}
			</div>

		</div>
		</form>

	</div>
</div>

</div>
@endsection
