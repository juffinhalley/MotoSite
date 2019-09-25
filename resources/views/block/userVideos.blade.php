

<section class="widget">
	<div class="user-photos-block">
		<div class="user-widgets _mgb10">
			<button id="js-user-video-button" class="button paper-button paper-button--hover button--lred button--lmd button--icon-left" data-ripple-color="#b7b7b7">
              <div class="button__content">
                @svg("lplus")
                <span class="button__text">Добавить видео</span></div>
            </button>
		</div>

		<!-- Для удаления видео буду слать сюда -> ./modules/ajax/RemoveVideo.php -->
		<div class="user-photos-block__content" data-select-tab-block="photovideo">
			<div id="js-user-video-container" class="user-photos-block__photos select-tabs-item is-active" data-select-tab-item="1">
				@for ($i = 0; $i < 22; $i++)
					@include('block.photoVideoItems', [
						"video"=> true
					])
				@endfor
			</div>
		</div>

		<div id="js-user-video-block" class="user-info-block__data user-info-block__data--inner">
			<div class="user-info-block__data-title">
				Добавить видео
			</div>

			<form class="user-info-block__data-content js-form" data-params="" action="" method="post" data-ajax="./hidden/response/demo.json">
				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item form-item--flat form-item--md">
                      <label for="user-moto" class="form-caption">Раздел:</label>
                      <div class="select-wrapper">
                        <select id="user-moto" class="js-choice-select" data-select-search="false">
                          <option value="0">раздел1</option>
                          <option value="1">раздел2</option>
                          <option value="2">раздел3</option>
                        </select>
                      </div>
                    </div>
				</div>

				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item">
                      <label for="user-video-url" class="form-caption">Ссылка на вставку видео с youtube:</label>
                      <input data-rule-url="true" type="text" id="user-video-url" name="user-video-url" class="form-input">
                    </div>
				</div>

				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item">
                      <label for="user-video-name" class="form-caption">Название видео:</label>
                      <input type="text" id="user-video-name" name="user-video-name" class="form-input">
                    </div>
				</div>

				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item">
                       <label for="user-video-descr" class="form-caption">Описание видео:</label>
                       <textarea type="textarea" id="user-video-descr" name="user-video-descr" class="form-textarea"></textarea>
                     </div>
				</div>

				<div class="user-info-block__data-row">
					<button id="js-user-video-close" class="button paper-button paper-button--hover button--default button--md _mgla" data-ripple-color="#b7b7b7">
                      <div class="button__content"><span class="button__text">Отмена</span></div>
                    </button>
                    <button class="button paper-button paper-button--hover button--default button--white button--md" data-ripple-color="#b7b7b7" type="submit">
                      <div class="button__content"><span class="button__text">Разместить</span></div>
                    </button>
				</div>
			</form>
		</div>

		<div id="js-user-video-block-edit" class="user-info-block__data user-info-block__data--inner">
			<div class="user-info-block__data-title">
				Редактировать видео
			</div>

			<form class="user-info-block__data-content js-form" data-params="" action="" method="post" data-ajax="./hidden/response/demo.json">
				<div class="user-info-block__data-row user-info-block__data-row--w100">
					<div class="form-item form-item--flat form-item--md">
                      <label for="user-moto" class="form-caption">Раздел:</label>
                      <div class="select-wrapper">
                        <select id="user-moto" class="js-choice-select" data-select-search="false">
                          <option value="0">раздел1</option>
                          <option value="1">раздел2</option>
                          <option value="2">раздел3</option>
                        </select>
                      </div>
                    </div>
				</div>
                <div class="user-info-block__data-row user-info-block__data-row--w100">
                  <div class="form-item">
                    <label for="user-video-url" class="form-caption">Ссылка на вставку видео с youtube:</label>
                    <input data-rule-url="true" value="https://youtu.be/hSrOpTYKNMw" type="text" id="user-video-url" name="user-video-url" class="form-input">
                  </div>
                </div>
                <div class="user-info-block__data-row user-info-block__data-row--w100">
                  <div class="form-item">
                    <label for="user-video-name" class="form-caption">Название видео:</label>
                    <input value="YAMAHA YZF-R3A" type="text" id="user-video-name" name="user-video-name" class="form-input">
                  </div>
                </div>
                <div class="user-info-block__data-row user-info-block__data-row--w100">
                  <div class="form-item">
                    <label for="user-video-descr" class="form-caption">Описание видео:</label>
                    <textarea type="textarea" id="user-video-descr" name="user-video-descr" class="form-textarea">Мой новый мотоцикл - YAMAHA YZF-R3A</textarea>
                  </div>
                </div>
                <div class="user-info-block__data-row">
                  <button id="js-user-video-edit-close" class="button paper-button paper-button--hover button--default button--md _mgla" data-ripple-color="#b7b7b7">
                    <div class="button__content"><span class="button__text">Отмена</span></div>
                  </button>
                  <button class="button paper-button paper-button--hover button--default button--white button--md" data-ripple-color="#b7b7b7" type="submit">
                    <div class="button__content"><span class="button__text">Разместить</span></div>
                  </button>
                </div>
			</form>
		</div>
	</div>
</section>