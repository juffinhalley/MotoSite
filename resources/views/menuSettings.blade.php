<?php
	$languageData = [
		[
			"text"=> "РУС",
			"url" => "#"
		],
		[
			"text"=> "ENG",
			"url" => "#"
		],
		[
			"text"=> "DEU",
			"url" => "#"
		],
		[
			"text"=> "FRE",
			"url" => "#"
		],
		[
			"text"=> "ESP",
			"url" => "#"
		],
		[
			"text"=> "汉语",
			"url" => "#"
		],
		[
			"text"=> "العربية",
			"url" => "#"
		]
	];

	$alertsData = [
		[
			"text" => "Сообщения",
			"index" => "2",
			"url" => "/"
		],
		[
			"text" => "Статьи",
			"index" => "3",
			"url" => "/"
		],
		[
			"text" => "Люди",
			"index" => "4",
			"url" => "/"
		],
		[
			"text" => "Батлы",
			"index" => "5",
			"url" => "/"
		],
		[
			"text" => "Видеозаписи",
			"index" => "6",
			"url" => "/"
		],
		[
			"text" => "Объявления",
			"index" => "7",
			"url" => "/"
		],
		[
			"text" => "Мотоциклы",
			"index" => "8",
			"url" => "/"
		],
		[
			"text" => "События",
			"index" => "9",
			"url" => "/"
		],
		[
			"text" => "Репутация",
			"index" => "10",
			"url" => "/"
		]
	];

	$blData = [
		[
			"text" => "Никита Шевченко",
			"index" => "1",
			"restore" => ""
		],
		[
			"text" => "Анатолий Корогодский",
			"index" => "2",
			"restore" => ""
		],
		[
			"text" => "Константин Никольский",
			"index" => "3",
			"restore" => ""
		],
		[
			"text" => "Давид Таргамадзе",
			"index" => "4",
			"restore" => ""
		]
	];
?>

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
				<div class="menu-settings">
					<form class="modal js-form" method="post" data-ajax="./hidden/response/demo.json">
						{{-- Общие настройки --}}
						<div class="grid">
							<div class="gcell gcell--2 _lGrey3-bg"></div>
							<div class="gcell gcell--8 _ptb-ms _lGrey3-bg _text-center">
								<span class="title title--dark title--light title--sm">
									Общие настройки
								</span>
							</div>
							<div class="gcell gcell--2 _lGrey3-bg"></div>
							<div class="gcell gcell--12">
								<div class="grid grid--sm-2 grid--1 _plr-def _pt-ms _pb-lg">
									<div class="gcell _def-pr-mg">
										<div class="grid grid--2">
											<div class="gcell gcell--12 gcell--def-auto _def-pr-lg _flex _justify-center _def-justify-start _mb-md _def-mb-none _pt-sm">
												<span class="title title--dark title--light title--sm">
													Язык страниц:
												</span>
											</div>
											<div class="gcell gcell--12 gcell--def-7 _flex _justify-center _def-justify-start _pt-sm">
												<div class="grid grid--4 _flex grid--hspace-none">
													<div class="gcell gcell--3 _mb-ms _flex _justify-center _def-justify-start _items-center _def-items-start _flex-noshrink">
														<a href="#" class="menu-settings__language-item is-active" data-language-item>
															УКР
														</a>
													</div>
													@foreach ($languageData as $item)
													<div class="gcell gcell--3 _mb-ms _flex _justify-center _def-justify-start _items-center _def-items-start _flex-noshrink">
														<a href="{{ $item['url'] }}" class="menu-settings__language-item" data-language-item>
															{{ $item['text'] }}
														</a>
													</div>
													@endforeach
												</div>
											</div>
										</div>
									</div>
									<div class="gcell _md-pl-xl _flex _items-center _def-items-start">
										<div class="menu-settings__contacts">
											<div class="menu-settings__item">
												<div class="grid grid--psh-3 grid--vspace-md grid--psh-vspace-none _flex _flex-column _psh-flex-row _items-center grid--psh-hspace-sm _mb-md">
													<div class="gcell gcell--psh-auto">
														<span class="title title--dark title--light title--sm">
															E-mail:
														</span>
													</div>
													<div class="gcell gcell--psh-auto _psh-mr-auto _flex _justify-center _psh-justify-start">
														<span class="text text--def text--grey">
															bulh*****@gmail.com
														</span>
													</div>
													<div class="gcell gcell--psh-auto">
														<div data-mfp-src="#change-email-popup" class="button paper-button paper-button--hover button--facepalmwhite button--xs button--vam popup-default" data-ripple-color="#b7b7b7">
															<div class="button__content">
																<span class="button__text">Изменить</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="menu-settings__item">
												<div class="grid grid--psh-3 _flex _flex-column _psh-flex-row _items-center grid--psh-hspace-sm grid--vspace-ms grid--psh-vspace-none _mb-md">
													<div class="gcell gcell--psh-auto">
														<span class="title title--dark title--light title--sm">
															Пароль:
														</span>
													</div>
													<div class="gcell gcell--psh-auto _psh-mr-auto _flex _justify-center _psh-justify-start">
														<span class="text text--def text--grey">
															*******
														</span>
													</div>
													<div class="gcell gcell--psh-auto">
														<div data-mfp-src="#change-password-popup" class="button paper-button paper-button--hover button--facepalmwhite button--xs button--vam popup-default" data-ripple-color="#b7b7b7">
															<div class="button__content">
																<span class="button__text">Изменить</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="menu-settings__item">
												<div class="grid grid--psh-3 _flex _flex-column _psh-flex-row _items-center grid--psh-hspace-sm grid--vspace-ms grid--psh-vspace-none _mb-md">
													<div class="gcell gcell--psh-auto">
														<span for="menu-settings-telephone" class="title title--dark title--light title--sm">
															Телефон:
														</span>
													</div>
													<div class="gcell gcell--psh-auto _psh-mr-auto _flex _justify-center _psh-justify-start">
														<span class="text text--def text--grey">
															+38 (095) 01-90-831
														</span>
													</div>
													<div class="gcell gcell--psh-auto">
														<div data-mfp-src="#change-telephone-popup" class="button paper-button paper-button--hover button--facepalmwhite button--xs button--vam popup-default" data-ripple-color="#b7b7b7">
															<div class="button__content">
																<span class="button__text">Изменить</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						{{-- Оповещения --}}

						<div class="grid">
							<div class="gcell gcell--2 _lGrey3-bg"></div>
							<div class="gcell gcell--12 gcell--psh-8 _text-center _ptb-ms _lGrey3-bg">
								<span class="title title--dark title--light title--sm">
									Оповещения
								</span>
							</div>
							<div class="gcell gcell--12 gcell--psh-2 _lGrey3-bg _ptb-ms _flex _justify-center _psh-justify-end">
								<div class="onoff-switch _psh-mr-def">
									<input type="checkbox" name="onoffswitch-all" class="onoff-switch__checkbox" id="onoffswitch-all" checked>
									<label class="onoff-switch__label" for="onoffswitch-all">
										<span class="onoff-switch__inner">
											<span class="onoff-switch__inner-on">вкл</span>
											<span class="onoff-switch__inner-off">выкл</span>
										</span>
										<span class="onoff-switch__switch"></span>
									</label>
								</div>
							</div>
							<div class="gcell gcell--12">
								<div class="grid grid--1 grid--sm-2 grid--md-5 grid--hspace-none grid--vspace-none _pb-def">
									<div class="gcell">
										<div class="checkbox-alerts checkbox-alerts--default checkbox-alerts--ldef checkbox-alerts--lhgrey4 paper-button paper-button--hover">
											<input class="checkbox-alerts__input" type="checkbox" name="onoffalerts--1" id="onoffalerts--1">
											<label class="checkbox-alerts__label _pl-def" for="onoffalerts--1">
												<div class="checkbox-alerts__icon">
													@svg('okay')
												</div>
												<span>Фотографии</span>
											</label>
										</div>
									</div>
									@foreach ($alertsData as $item)
									<div class="gcell">
										<div class="checkbox-alerts checkbox-alerts--default checkbox-alerts--ldef checkbox-alerts--lhgrey4 paper-button paper-button--hover">
											<input class="checkbox-alerts__input" type="checkbox" name="onoffalerts--{{ $item['index'] }}" id="onoffalerts--{{ $item['index'] }}" checked>
											<label class="checkbox-alerts__label _pl-def" for="onoffalerts--{{ $item['index'] }}">
												<div class="checkbox-alerts__icon">
													@svg('okay')
												</div>
												<span>{{ $item['text'] }}</span>
											</label>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>

						<div class="grid">
							<div class="gcell gcell--2 _lGrey3-bg"></div>
							<div class="gcell gcell--12 gcell--psh-8 _text-center _ptb-ms _lGrey3-bg">
								<span class="title title--dark title--light title--sm">
									Оповещения об угоне мотоциклов
								</span>
							</div>
							<div class="gcell gcell--12 gcell--psh-2 _lGrey3-bg _ptb-ms _flex _justify-center _psh-justify-end">
								<div class="onoff-switch _mr-def">
									<input type="checkbox" name="onoffswitch-away" class="onoff-switch__checkbox" id="onoffswitch-away" checked>
									<label class="onoff-switch__label" for="onoffswitch-away">
										<span class="onoff-switch__inner">
											<span class="onoff-switch__inner-on">вкл</span>
											<span class="onoff-switch__inner-off">выкл</span>
										</span>
										<span class="onoff-switch__switch"></span>
									</label>
								</div>
							</div>
							<div class="gcell gcell--12 _pl-def _ptb-ms">
								<div class="checkbox-alerts checkbox-alerts--default paper-button paper-button--hover">
									<input class="checkbox-alerts__input" type="checkbox" name="onoff-geoalerts" id="onoff-geoalerts">
									<label class="checkbox-alerts__label" for="onoff-geoalerts">
										<div class="checkbox-alerts__icon">
											@svg('okay')
										</div>
										<span>Выводить сообщения согласно территориальному критерию</span>
									</label>
								</div>
							</div>
							<div class="gcell gcell--12">

								<div class="grid grid--1 grid--vspace-ms grid--psh-vspace-none grid--psh-hspace-xl _p-def _pb-lg _pt-ms _flex">

									<div class="gcell gcell--psh-3 _flex-noshrink">
										<div class="form-item form-item--wiconr">
											<input type="text" placeholder="страна" value="Украина, UA" class="form-input form-input--sm" id="js-form-country" name="" data-error-text="Выберите страну">
											<label for="js-form-country" class="form-icon form-icon--sm">
												@svg('marker')
											</label>
										</div>
									</div>

									<div class="gcell gcell--psh-3 _flex-noshrink">
										<div class="form-item form-item--wiconr">
											<input type="text" placeholder="регион" class="form-input form-input--sm" id="js-form-region" name="" data-error-text="Выберите регион">
											<label for="js-form-region" class="form-icon form-icon--sm">
												@svg('marker')
											</label>
										</div>
									</div>

									<div class="gcell gcell--psh-3 _flex-noshrink">
										<div class="form-item form-item--wiconr">
											<input type="text" placeholder="город" class="form-input form-input--sm" id="js-form-city" name="" data-error-text="Выберите город">
											<label for="js-form-city" class="form-icon form-icon--sm">
												@svg('marker')
											</label>
										</div>
									</div>
									<div class="gcell gcell--3 _flex-shrink"></div>
								</div>
							</div>
						</div>


						<div class="grid">

							<div class="gcell gcell--2 _lGrey3-bg"></div>
							<div class="gcell gcell--8 _ptb-ms _lGrey3-bg _text-center">
								<span class="title title--dark title--light title--sm">
									Уникальный id пользователя
								</span>
							</div>
							<div class="gcell gcell--2 _lGrey3-bg"></div>

							<div class="gcell gcell--12 _psh-pl-def _ptb-xl">
								<div class="grid grid--1">
									@if (isset($notReady))
									<div class="gcell _flex _justify-center _items-center">
										<span class="text text--def text--greybd">Для того, чтобы иметь возможность изменить свой id, необходимо попасть в топ 10 пользователей месяца</span>
									</div>
									@else
									<div class="gcell _flex _flex-column _psh-flex-row _items-center _psh-items-start _mb-xl">
										<span class="text text--def text--grey _psh-mr-sm _mb-ms _psh-mb-none _text-center _psh-text-left">Сейчас ваша страница доступна по ссылке</span>
										<a href="" class="link _flex _justify-center _psh-justify-start">
											<span class="text text--def text--grey">www.motosite.club/</span>
											<span class="text text--def text--dark">id142318</span>
										</a>
									</div>
									<div class="gcell _flex _flex-column _psh-flex-row _items-center">
										<a href="" class="link _flex _justify-center _psh-justify-start _psh-mr-mg _mb-ms _psh-mb-none">
											<span class="text text--def text--grey">www.motosite.club/</span>
											<span class="text text--def text--dark">id142318</span>
										</a>
										<div data-mfp-src="#change-id-popup" class="button paper-button paper-button--hover button--facepalmwhite button--xs button--vam popup-default" data-ripple-color="#b7b7b7">
											<div class="button__content">
												<span class="button__text">Изменить</span>
											</div>
										</div>
									</div>
									@endif
								</div>
							</div>

						</div>

						<div class="grid">
							<div class="gcell gcell--2 _lGrey3-bg"></div>
							<div class="gcell gcell--8 _ptb-ms _lGrey3-bg _text-center">
								<span class="title title--dark title--light title--sm">
									Черный список пользователя
								</span>
							</div>
							<div class="gcell gcell--2 _lGrey3-bg"></div>

							@if (isset($blEmpty))
							<div class="gcell gcell--12 _flex _justify-center _items-center">
								<span class="text text--def text--greybd">Ваш список пуст</span>
							</div>
							@else
							<div class="gcell gcell--12 _plr-def _pt-def _pb-xl">
								<div class="text text--def text--grey _mb-xl _text-center _md-text-left">
									В вашем черном списке <span>11</span> пользователей
								</div>
								<div class="grid grid--1 grid--sm-2 grid--hspace-ms grid--md-hspace-none grid--vspace-ms grid--def-vspace-def _mb-ms">
									@foreach ($blData as $item)
									<div class="gcell">
										@include('block.blackListItem')
									</div>
									@endforeach
								</div>
								<div class="show-more-button-wrapper show-more-button-wrapper--mpnone">
									<button class="button paper-button paper-button--hover button--showmore button--mds js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
										<div class="button__content">
											<span class="button__text">Показать всех</span>

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
							@endif
						</div>

						<div class="grid">
							<div class="gcell gcell--2 _grey4-bg"></div>
							<div class="gcell gcell--8 _ptb-ms _grey4-bg _text-center">
								<div data-mfp-src="#delete-profile-popup" class="link link--def link--grey link--hdark link--td popup-default">
									Удалить свой профиль
								</div>
							</div>
							<div class="gcell gcell--2 _grey4-bg"></div>
						</div>

						<div class="grid _flex _flex-column-reverse _items-center _psh-flex-row _justify-center _psh-justify-end _psh-mtb-xl _psh-pr-def">
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
								<button class="button button--lgm button--llGrey paper-button paper-button--hover" data-ripple-color="#b7b7b7">
									<div class="button__content">
										<span class="button__text">
											Сохранить изменения
										</span>
									</div>
								</button>
							</div>
						</div>


					</form>
				</div>
			</div>
		</div>

	</div>
</div>

@include('block.popups.menuSettings.changeEmail')
@include('block.popups.menuSettings.changePassword')
@include('block.popups.menuSettings.changeTelephone')
@include('block.popups.menuSettings.deleteProfile')
@include('block.popups.menuSettings.deleteBlItem')
@include('block.popups.menuSettings.changeId')

@endsection
