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
				<form class="modal js-form" method="post" data-ajax="./hidden/response/demo.json">
					<div class="grid grid--1">

						<div class="gcell gcell--12 gcell--psh-9 _borderB1gr _p-ms">
							<div class="title title--light title--ms title--dark _text-center">
								Создание записи бортжурнала
							</div>
						</div>

						<div class="gcell gcell--12 gcell--psh-3 _p-ms _lGrey3-bg _border1gr _borderB0">
							<div class="title title--light title--sm title--dark _text-center">
								Создать запись
							</div>
						</div>
					</div>

					<div class="_lGrey3-bg _border1gr _borderT0  _pb-xl">
						<div class="grid grid--1 _flex _flex-column _psh-flex-row _p-md _psh-p-xl _pt-def">

							<div class="gcell gcell--psh-4 _flex _items-center _justify-center _psh-justify-start _mb-ms _psh-mb-none">
								<div class="form-item">
									<div class="select-wrapper select-wrapper--mdm select-wrapper--grey select-wrapper--lGrey4">
										<select class="js-choice-select" data-select-search="false">
											<option value="0">Аксессуары</option>
											<option value="1">Наблюдения и впечатления</option>
											<option value="2">Ремонт и обслуживание</option>
											<option value="3">Не ремонт</option>
										</select>
									</div>
								</div>
							</div>

							<div class="gcell gcell--psh-8">
								<div class="form-item">
									<input type="text" value="Теперь все стало еще лучше" class="form-input form-input--lg" name="logbook-record-title">
								</div>
							</div>

						</div>

						<div class="grid grid--vspace-sm _flex _flex-column _psh-flex-row _items-center _psh-items-start _mb-xl _psh-ml-xl">
							<div class="gcell">
								<button class="button paper-button paper-button--hover button--facepalmwhite button--lgm button--omgmr1" data-ripple-color="#b7b7b7">
									<div class="button__content">
										@svg("camera")
										<span class="button__text">Загрузить фото</span>
									</div>
								</button>
							</div>
							<div class="gcell">
								<button class="button paper-button paper-button--hover button--facepalmwhite button--lgm button--omgmr1" data-ripple-color="#b7b7b7">
									<div class="button__content">
										@svg("plus")
										<span class="button__text">Добавить поле</span>
									</div>
								</button>
							</div>
							<div class="gcell">
								<button class="button paper-button paper-button--hover button--facepalmwhite button--lgm button--omgmr1" data-ripple-color="#b7b7b7">
									<div class="button__content">
										@svg("camera")
										<span class="button__text">Загрузить обложку</span>
									</div>
								</button>
							</div>
						</div>



						<div class="grid grid--1 _p-md _def-p-ms _psh-pl-xl _grey3-bg">

							<div class="gcell gcell--12 _flex _justify-between _mb-def">
								<label for="logbook-record-field" class="title title--dark title--normal title--xs">
									Поле:
								</label>

								<div class="icon icon--ms icon--grey _cp">
									@svg('cross')
								</div>
							</div>

							<div class="gcell _psh-pr-def">
								<div class="form-item">
									<textarea data-rule-minlength="9" data-rule-maxLength="100" name="logbook-record-field" id="logbook-record-field" rows="4" class="form-textarea">Таким образом, новая модель организационной деятельности играет важную роль в формировании экономической целесообразности принимаемых решений.</textarea>
								</div>
							</div>

						</div>

						<div class="grid grid--1 _p-md _psh-p-none _psh-ml-xl _psh-mt-ms ">
							<div class="gcell _mb-ms">
								@include('block.logbookRecordItem')
							</div>
							<div class="gcell _mb-ms">
								<label for="logbook-record-field1" class="title title--dark title--normal title--xs">
									Поле:
								</label>
							</div>
							<div class="gcell _psh-pr-xl">
								<div class="form-item">
									<textarea data-rule-minlength="9" data-rule-maxLength="100" name="logbook-record-field1" id="logbook-record-field1" rows="4" class="form-textarea">О том, что нужно знать: Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции обеспечивает актуальность новых предложений. Равным образом постоянный количественный рост и сфера нашей активности позволяет оценить значение позиций, занимаемых участниками в отношении поставленных задач.</textarea>
								</div>
							</div>
						</div>

						<div class="grid grid--1">
							<div class="gcell gcell--11 gcell--psh-10">
								<div class="logbook-record-slide">
									<div class="logbook-record-slide__sign">Слайдер</div>
									@for ($i = 0; $i
									< 2; $i++) @include('block.logbookRecordItem')
									@endfor
								</div>
							</div>
						</div>

						<div class="grid grid--1 _p-md _psh-p-none _psh-pl-xl">
							<div class="gcell _mb-ms">
								<label for="logbook-record-field2" class="title title--dark title--normal title--xs">
									Поле:
								</label>
							</div>
							<div class="gcell _mb-ms _psh-pr-xl">
								<div class="form-item">
									<textarea data-rule-minlength="9" data-rule-maxLength="100" name="logbook-record-field2" id="logbook-record-field2" rows="4" class="form-textarea">Таким образом, новая модель организационной деятельности играет важную роль в формировании экономической целесообразности принимаемых решений.</textarea>
								</div>
							</div>
							<div class="gcell _mb-ms">
								<label for="logbook-record-tor" class="title title--dark title--normal title--xs">
									Теги для записи:
								</label>
							</div>
							<div class="gcell _mb-ms">
								<div class="form-item">
									<input type="text" id="logbook-record-tor" class="form-input form-input--lgm" name="logbook-record-tor" placeholder="Напр.: обзор, мотоцикл, запчасти">
								</div>
							</div>
							<div class="gcell _flex _items-center _mb-ms">
								<div class="title title--dark title--normal title--xs">
									Обложка для записи:
								</div>
								<div class="logbook-record-preimg">
									<img src="{{ URL::asset('images/logo_record_preimg_70x50.jpg') }}" alt="" title="">
									<div class="logbook-record-preimg__delete">
										@svg('cross')
									</div>
								</div>
							</div>
						</div>

						<div class="grid _flex _flex-column-reverse _items-center _psh-flex-row _justify-center _psh-justify-end _psh-pr-xl">
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
											Создать
										</span>
									</div>
								</button>
							</div>
						</div>

						{{-- Close bg&borders --}}
					</div>
				</form>
			</div>


		</div>
	</div>

</div>
@endsection
