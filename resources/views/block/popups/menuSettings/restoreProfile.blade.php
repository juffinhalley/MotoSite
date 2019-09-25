<div class="modal">
	<form class="js-form popup-form popup-form--ms" method="post" data-ajax="./hidden/response/demo.json">

		<div class="grid grid--1">

			<div class="gcell _flex _justify-center _text-center _mb-lg">
				<span class="title title--dark title--light title--ms">Ваш аккаунт восстановлен после удаления</span>
			</div>

			<div class="gcell _mb-def">
				<div class="title title--light title--grey2 title--sm">
					Мы будем вам очень признательны, если укажете причину удаления анкеты
				</div>
			</div>

			<div class="gcell _mb-def _pr-mg _mr-mg">
				<div class="form-item">
					<div class="select-wrapper select-wrapper--lgs select-wrapper--br4 select-wrapper--llGrey">
						<select class="js-choice-select" data-select-search="false">
							<option value="0">Другая <span>(укажу в комментарии)</span></option>
							<option value="1">Причина 1</option>
							<option value="2">Причина 2</option>
							<option value="3">Причина 3</option>
						</select>
					</div>
				</div>
			</div>

			<div class="gcell _mb-mg _pr-mg _mr-mg">
				<div class="form-item">
					<label class="form-caption" for="restore-profile-comment">
						Ваш комментарий
					</label>
					<input required type="text" data-rule-minLength="5" class="form-input form-input--type2" name="restore-profile-comment" id="restore-profile-comment" placeholder="Напишите нам все, что думаете.." value="">
				</div>
			</div>

			<div class="gcell">
				<div class="grid">
					<div class="gcell _ml-auto _pr-mg _flex _items-center">
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
									Восстановить
								</span>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
