
<section class="widget">
	<div class="user-photos-block">
		<div class="user-widgets _mgb10">
			<div class="form-item form-item--red">
				<div class="select-wrapper select-wrapper--md">
					<!-- @TODO: тут value соответствуют data-select-tab-itemама которые ниже -->
					<select class="js-choice-select" data-custom-choice="photovideo" data-select-tabs="photovideo">
						<option selected value="1">Фотографии</option>
						<option value="2">Альбомы</option>
					</select>
				</div>
			</div>
		</div>

		<div class="user-photos-block__content" data-select-tab-block="photovideo">
			<!-- Для удаления видео буду слать сюда -> ./modules/ajax/RemovePhoto.php -->
			<div id="js-user-photo-container" class="user-photos-block__photos select-tabs-item is-active" data-select-tab-item="1">
				@for ($i = 0; $i < 22; $i++)
					@include('block.photoVideoItems', [
						"video"=> false
					])
				@endfor
			</div>

			<!-- Для удаления видео буду слать сюда -> ./modules/ajax/RemoveAlbom.php -->
			<div id="js-user-albom-container" class="user-photos-block__alboms select-tabs-item" data-select-tab-item="2">
				@for ($i = 0; $i < 8; $i++)
				<div class="user-alboms-item" data-albom-id="albomid12">
					<div class="user-alboms-item__image">
						<img src="{{ URL::asset('images/alboms_image_176x176.jpg') }}">
					</div>

					<div class="user-alboms-item__descr">
						<div class="user-alboms-item__tools">
							<div class="assets-button-block js-user-albom-remove">
								@svg("pen")
							</div>

							<div class="assets-button-block js-user-albom-remove">
								@svg("cross")
							</div>
						</div>

						<div class="user-alboms-item__title">
							Мотокросс Таврия
						</div>

						<div class="user-alboms-item__descr-content">
							<div class="user-alboms-item__descr-row">
								<div class="user-alboms-item__descr-item">Год:</div>
								<div class="user-alboms-item__descr-item">2017</div>
							</div>
							<div class="user-alboms-item__descr-row">
								<div class="user-alboms-item__descr-item">Фотографии:</div>
								<div class="user-alboms-item__descr-item">775</div>
							</div>
							<div class="user-alboms-item__descr-row">
								<div class="user-alboms-item__descr-item">Коментарии:</div>
								<div class="user-alboms-item__descr-item">3009</div>
							</div>
						</div>

						<div class="user-alboms-item__widgets">
							<div class="widget-button-block">
								@svg("eye")

								<span>6341</span>
							</div>

							<div class="widget-button-block">
								@svg("heart")

								<span>3219</span>
							</div>
						</div>
					</div>	
				</div>
				@endfor
			</div>
		</div>

		<div id="js-user-photo-block-edit" class="user-info-block__data user-info-block__data--inner">
			<div class="user-info-block__data-title">
				Редактировать фото
			</div>

			<form class="user-info-block__data-content js-form" data-params="" action="" method="post" data-ajax="./hidden/response/demo.json">
				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item form-item--flat form-item--md">
                      <label for="user-razdel" class="form-caption">Раздел:</label>
                      <div class="select-wrapper">
                        <select id="user-razdel" class="js-choice-select" data-select-search="false">
                          <option value="0">Личные фотографии</option>
                          <option value="1">Личные фотографии2</option>
                          <option value="2">Личные фотографии3</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-item form-item--flat form-item--md">
                      <label for="user-albom" class="form-caption">Альбом:</label>
                      <div class="select-wrapper">
                        <select id="user-albom" class="js-choice-select" data-select-search="false">
                          <option value="0">Мотоциклы</option>
                          <option value="1">Мотоциклы2</option>
                          <option value="2">Мотоциклы3</option>
                        </select>
                      </div>
                    </div>
				</div>

				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item">
                      <label for="user-video-url" class="form-caption">Название фотографии:</label>
                      <input value="YAMAHA YZF-R3A" type="text" id="user-video-url" name="user-video-url" class="form-input">
                    </div>
				</div>

				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item">
                      <label for="user-photo-descr" class="form-caption">Описание фотографии:</label>
                      <textarea type="textarea" id="user-photo-descr" name="user-photo-descr" class="form-textarea">Мой новый мотоцикл - YAMAHA YZF-R3A</textarea>
                    </div>
				</div>

				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item">
                      <label for="user-photo-descr" class="form-caption">Теги для поиска:</label>
                      <textarea type="textarea" id="user-photo-descr" name="user-photo-descr" class="form-textarea">Мотоцикл, серебристый, синий, yamaha yzf-r3a</textarea>
                    </div>
				</div>

				<div class="user-info-block__data-row">
					<button id="js-user-photo-edit-close" class="button paper-button paper-button--hover button--default button--md _mgla" data-ripple-color="#b7b7b7">
                      <div class="button__content"><span class="button__text">Отмена</span></div>
                    </button>
                    <button class="button paper-button paper-button--hover button--default button--white button--md" data-ripple-color="#b7b7b7" type="submit">
                      <div class="button__content"><span class="button__text">Опубликовать</span></div>
                    </button>
				</div>
			</form>
		</div>
	</div>
</section>