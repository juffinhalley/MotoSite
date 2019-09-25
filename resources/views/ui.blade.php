<?php
	$blData = [
		[
			"text" => "Давид Таргамадзе",
			"index" => "1",
			"restore" => "black-list-item__restore"
		],
		[
			"text" => "Давид Таргамадзе",
			"index" => "1",
			"restore" => ""
		]
	];
	$bestMaterialsItem = [
		[
			"title" => "Фото недели",
			"type" => "photo"
		],
		[
			"title" => "Видео недели",
			"type" => "video"
		],
		[
			"title" => "Пользователь недели",
			"type" => "user"
		],
		[
			"title" => "Мотоцикл недели",
			"type" => "moto"
		],
		[
			"title" => "Событие недели",
			"type" => "event"
		],
		[
			"title" => "Статья недели",
			"type" => "article"
		]
	];
	$slideTopItem = [
		[
			"typeItem" => "motorcycles",
			"text" => "Yamaha yzf-r6a Thunder",
			"top" => "топ 1"

		],
		[
			"typeItem" => "events",
			"text" => "Yamaha yzf-r6a Thunder",
			"top" => "топ 2"
		],
		[
			"typeItem" => "places",
			"text" => "Yamaha yzf-r6a Thunder",
			"top" => "топ 3"
		],
		[
			"typeItem" => "motoTop",
			"text" => "Yamaha yzf-r6a Thunder",
			"top" => "топ 4",
			"image" => "top_item_260x180.jpg",
		],
		[
			"typeItem" => "motoTop",
			"text" => "Yamaha yzf-r6a Thunder",
			"top" => "топ 5",
			"image" => "top_item_260x180.jpg",
			"tightDescr" => ""
		],
		[
			"typeItem" => "photoTop",
			"top" => "топ 5",
			"image" => "top_item_260x180.jpg"
		]
	];
	$dlphoto = [
		[
			"id" => "555"
		]
	];
	$dlphotocover = [
		[
			"id" => "556"
		]
	];
	$dlphotopick = [
		[
			"id" => "557"
		]
	];
	$top = [
		[
			"top" => "4.9",
			"text" => "Yamaha yzf-r6a Thunder"
		]
	];
	$person = [
		[
			"top" => "4.9"
		],
		[
			"rate" => "",
			"date" => "",
			"anotherPlaces" => ""
		],
		[
			'buttonNone' => '',
			'cls' => 'person-item--user-filter',
			'userFilter' => ''
		],
		[
			
		]
	];
	$motoTop = [
		"image" => "moto_top_slide_item_235x180.jpg"
	];
	$places = [
		[
			"typePlaces" => "normal"
		],
		[
			"typePlaces" => "places",
			"name" => "Гараж #113",
			"geo" => "Херсон,UA"
		],
		[
			"typePlaces" => "places",
			"name" => "Парк Шевченко",
			"geo" => "Херсон,UA",
			"info" => "17:00 - 21:00",
			"infoAdd" => "пт-сб"
		],
		[
			"typePlaces" => "places",
			"name" => "Motohotel Odessa",
			"geo" => "Херсон,UA",
			"info" => "300-700",
			"infoAdd" => "грн/ночь",
			"info-second" => "motohotel.ua"
		]
	]
?>
@extends("layouts.main")

@section("content")

<div class="section">
	<div class="container">
		<div class="page-content-wrapper__content">
			<aside class="page-aside-block">
				@include("block.sideMenu")

				@include("block.asideMap")
			</aside>
			<div class="page-content">
				<div class="ui" data-tabs>
					<div class="ui__bg"></div>
					@include("block.uiButtons")

					{{----------------------ITEMS----------------------}}

					<div class="ui__wrapper">

						<div class="ui__container" data-tabs-container="1">
							@include ("block.logbookListItem")
							<hr class="_spacer30">
							@include ("block.logbookListItem", ["square" => ""])
							<hr class="_spacer30">
							@include ("block.logbookRecordItem")
							<hr class="_spacer30">
							@include ("block.slideItems.club")
							<hr class="_spacer30">
							@include ("block.person")
							<hr class="_spacer30">
							@foreach ($person as $itemPerson)
								@include ("block.person", $itemPerson)
								<hr class="_spacer30">
							@endforeach
							@include ("block.slideItems.userSlideItem")
							<hr class="_spacer30">
							@include ("block.mainMotoProfile.userRecordsItem")
							<hr class="_spacer30">
							@include ("block.mainBattles")
							<hr class="_spacer30">
							@include ("block.ownerItem")
							<hr class="_spacer30">
							@foreach ($top as $item)
							@include ("block.myPlaceItem")
							@endforeach
							<hr class="_spacer30">
							@include("block.createActions")
							<hr class="_spacer30">
							@include ("block.dlPhotoItem", ["downloadCover" => ""])
							<hr class="_spacer30">
							@foreach ($dlphotocover as $item)
								@include ("block.dlPhotoItem")
							@endforeach
							<hr class="_spacer30">
							@foreach ($dlphoto as $item)
								@include ("block.dlPhotoItem", ["cover" => ""])
							@endforeach
							<hr class="_spacer30">
							@foreach ($dlphotopick as $item)
								@include ("block.dlPhotoItem", ["pick" => ""])
							@endforeach
							<hr class="_spacer30">
							@include ("block.dlPhotoItem", ["albumCover" => ""])
							<hr class="_spacer30">
							@include("block.breadcrumbs")
							<span class="text">Для крошек: 1. Навесить любой класс врапперу, например - ["cls" => "_mb-md"] 2. На содержимое - ["clsnomgl"=>"_nomgl"]</span>
							<hr class="_spacer30">
							@include("widget.pagination")
							<hr class="_spacer30">
							@include("widget.statisticCounters")
							<hr class="_spacer30">
							@include("widget.statisticCounters", ["typeOfCounters" => "ehc"])
							<hr class="_spacer30">
							@include("widget.statisticCounters", ["typeOfCounters" => "eh"])
							<hr class="_spacer30">
							<span class="text">Для иконок передаем ["typeOfCounters" => "ehc/eh/t/т.д."] в зависимости от того, что необходимо (eyes- e, heart - h, trophy - t, comment - c)</span>
							@include ("block.slideItems.club", ["type" => "topSlider"])
							<hr class="_spacer30">

							<div class="grid">
								@foreach ($places as $item)
									<div class="gcell gcell--7">
										@include("block.placeItem", $item)
										<hr class="_spacer30">
									</div>
								@endforeach
							</div>
							<div class="grid grid-3 grid--hspace-md">
								@foreach ($slideTopItem as $item)
									<div class="gcell">
										@include ("block.topItem")
									</div>
								@endforeach
							</div>
							<hr class="_spacer30">

							<div class="grid grid--3 grid--hspace-def grid--vspace-def">
								@foreach ($bestMaterialsItem as $item)
								<div class="gcell">
									@include ("block.bestMaterialsItem")
								</div>
								@endforeach
							</div>
							<hr class="_spacer30">

							<div class="grid">
								@foreach ($blData as $item)
								<div class="gcell gcell--7">
									@include ("block.blackListItem")
									<hr class="_spacer30">
								</div>
								@endforeach
							</div>

						</div>
					</div>

					{{----------------------POPUPS----------------------}}

					<div class="ui__wrapper">

						<div class="ui__container" data-tabs-container="2">
							<div class="ui__black-box">
								@include ("block.popups.mainNotAuth")
								<hr class="_spacer30">
								@include ("block.popups.placeMenu")
								<hr class="_spacer30">
								@include ("block.popups.addedNewMM")
								<hr class="_spacer30">
								<hr class="_spacer30">
								@include ("block.popups.addNewMM")
								<hr class="_spacer30">
								@include ("block.popups.addPhoto")
								<hr class="_spacer30">
								@include ("block.popups.addPhotoFromAlbum")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeEmail")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changePassword")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeId")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeTelephone")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.consentToDelete")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.deleteDone")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.deleteProfile")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.restoreProfile")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.deleteBlItem")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeEmailConfirm")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeTelephoneConfirm")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeTelephoneDone")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeEmailDone")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changePasswordDone")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeIdDone")
								<hr class="_spacer30">
								@include ("block.popups.menuSettings.changeEmailSentLink")
								<hr class="_spacer30">
							</div>
						</div>
					</div>

					{{----------------------PAGES/PART OF PAGES----------------------}}

					<div class="ui__wrapper">

						<div class="ui__container" data-tabs-container="3">
							@include ("block.logbookTopBlock")
							<hr class="_spacer30">
							@include ("block.comments")
							<hr class="_spacer30">
							<div class="wrapper-content-block">
								@include ("block.mainMotoProfile.motoImage")
								<hr class="_spacer30">
								@include ("block.mainMotoProfile.motoUser")
								<hr class="_spacer30">
								@include ("block.mainMotoProfile.motoUserData")
								<hr class="_spacer30">
								@include ("block.mainMotoProfile.motoUserData", ["self" => ""])
								<hr class="_spacer30">
								@include ("block.mainMotoProfile.userRecords")
								<hr class="_spacer30">
								@include ("block.logbookNote.logbookNoteCover")
								<hr class="_spacer30">
								@include ("block.logbookNote.logbookNoteUser")
								<hr class="_spacer30">
								@include ("block.logbookNote.logbookNoteContent")
								<hr class="_spacer30">
							</div>
						</div>
					</div>

					{{----------------------Piece of Decore----------------------}}

					<div class="ui__wrapper">

						<div class="ui__container" data-tabs-container="4">
							@include ("block.motoAchivTitleGag")
							<hr class="_spacer30">
						</div>
					</div>


					{{----------------------Examples----------------------}}

					<div class="ui__wrapper">

						<div class="ui__container" data-tabs-container="5">
							@include ("block.formSample")
							<hr class="_spacer30">

							{{-- BUTTONS --}}

							<div class="grid grid--5 grid--hspace-def grid--vspace-def _mb-xl">
								<div class="gcell">
									<button class="button button--empty">
										<div class="button__content">
											<span class="button__text">
												Отмена
											</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--defgr js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
										<div class="button__content">
											<span class="button__text">Смотреть все</span>

											<span class="button__icon">
												@svg("arrowFullRight")
											</span>
										</div>
										<div class="paper-ripple">
											<div class="paper-ripple__background"></div>
											<div class="paper-ripple__waves"></div>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--default" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">Подробнее</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--type-3 paper-button paper-button--hover">
										<div class="button__content">
											Создать место
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--second" data-ripple-color="#e3e3e3">
										<div class="button__content">
											<span class="button__text">Проложить маршрут</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--close button--mgsq paper-button paper-button--hover" data-ripple-color="#b7b7b7">
										<div class="button__content">
											@svg("cross")
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--round paper-button paper-button--hover">
										@svg("cross")
									</button>
								</div>
								<div class="gcell">
									<button class="button button--round-t2 paper-button paper-button--hover">
										@svg("cross")
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--lgrey" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">Ок</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--dark paper-button paper-button--hover" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">
												Отмена
											</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--llGrey paper-button paper-button--hover" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">
												Создать
											</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--grey2right paper-button paper-button--hover" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">
												Отмена
											</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--grey2def paper-button paper-button--hover" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">
												Отмена
											</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--whiteborder " data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">Подробней</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--omgwhite" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">Поиск</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--white button--icon-left" data-ripple-color="#b7b7b7">
										<div class="button__content">
											@svg("heart")
											<span class="button__text">Нравится</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--facepalmwhite" data-ripple-color="#b7b7b7">
										<div class="button__content">
											@svg("camera")
											<span class="button__text">Загрузить фото</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--lred button--icon-left" data-ripple-color="#b7b7b7">
										<div class="button__content">
											@svg("pen")
											<span class="button__text">Изменить</span></div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--red" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">Зарегистрироваться</span>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button paper-button paper-button--hover button--showmore js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
										<div class="button__content">
											<span class="button__text">Показать ещё 3 альбома</span>
											<span class="button__icon">
												@svg("arrowBottom")
											</span>
										</div>
										<div class="paper-ripple">
											<div class="paper-ripple__background"></div>
											<div class="paper-ripple__waves"></div>
										</div>
									</button>
								</div>
								<div class="gcell">
									<button class="button button--type-orange button--smx paper-button paper-button--hover">
										<div class="button__content">
											Написать
										</div>
									</button>
								</div>

							</div>

							{{-- CHECKBOXES --}}

							<div class="grid grid--6 grid--vspace-md grid--hspace-md">

								<div class="gcell">
									<div class="styled-Checkbox styled-Checkbox--button paper-button paper-button--hover" data-ripple-color="#b7b7b7">
										<input type="checkbox" id="3334">
										<label for="3334">Использовать текущие фото</label>
									</div>
								</div>
								<div class="gcell">
									<div class="checkbox-alerts checkbox-alerts--type2 checkbox-alerts--imd">
										<input class="checkbox-alerts__input" type="checkbox" name="" id="515">
										<label class="checkbox-alerts__label" for="515">
											<div class="checkbox-alerts__icon">
												@svg("okay")
											</div>
										</label>
									</div>
								</div>
								<div class="gcell">
									<div class="checkbox-alerts checkbox-alerts--default">
										<input class="checkbox-alerts__input" type="checkbox" id="7877">
										<label class="checkbox-alerts__label" for="7877">
											<div class="checkbox-alerts__icon">
												@svg("okay")
											</div>
											<span>Принимаю</span>
										</label>
									</div>
								</div>
								<div class="gcell">
									<div class="onoff-switch">
										<input type="checkbox" class="onoff-switch__checkbox" id="577" checked>
										<label class="onoff-switch__label" for="577">
											<span class="onoff-switch__inner">
												<span class="onoff-switch__inner-on">вкл</span>
												<span class="onoff-switch__inner-off">выкл</span>
											</span>
											<span class="onoff-switch__switch"></span>
										</label>
									</div>
								</div>

							</div>

							{{-- select --}}

							<div class="grid grid--6 grid--vspace-md grid--hspace-md">
								<div class="gcell">
									<div class="select-wrapper">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
									</div>
								</div>
								<div class="gcell">
									<div class="select-wrapper select-wrapper--item-type">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
									</div>
								</div>
								<div class="gcell">
									<div class="select-wrapper select-wrapper--white">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
									</div>
								</div>
								<div class="gcell">
									<div class="select-wrapper select-wrapper--grey">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
									</div>
								</div>
								<div class="gcell">
									<div class="select-wrapper select-wrapper--lGrey">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
									</div>
								</div>
								<div class="gcell">
									<div class="select-wrapper select-wrapper--br4">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
									</div>
								</div>
								<div class="gcell">
									<div class="select-wrapper select-wrapper--llGrey">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
									</div>
								</div>
								<div class="gcell">
									<div class="select-wrapper select-wrapper--lGrey4">
										<select class="js-choice-select">
											<option selected value="1">Все</option>
											<option value="3">События</option>
											<option value="2">Люди</option>
											<option value="4">Мотоциклы</option>
										</select>
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
@endsection
