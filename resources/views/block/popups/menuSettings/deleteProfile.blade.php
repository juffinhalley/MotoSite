<div class="popup-form popup-form--ms popup-form--center mfp-hide" id="delete-profile-popup">
	<form class="js-form" method="post" data-ajax="./hidden/response/demo.json">

		<div class="grid grid--1">

			<div class="gcell _flex _justify-center _text-center _mb-lg">
				<span class="title title--dark title--light title--ms">Для подтверждения удаления введите пароль от учетной записи</span>
			</div>

			<div class="gcell _mb-mg _pr-mg _mr-mg">
				<div class="form-item form-item--wiconr form-item--2label">
					<label class="form-caption" for="delete-profile-password">
						Введите пароль
					</label>
					<input type="password" required data-rule-minLength="5" data-rule-password="true" class="form-input form-input--type2" name="delete-profile-password" id="delete-profile-password" value="">
					<label for="delete-profile-password" class="form-icon form-icon--ms">
						@svg('eye')
					</label>
				</div>
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
					<label class="form-caption" for="delete-profile-comment">
						Ваш комментарий
					</label>
					<input required type="text" data-rule-minLength="5" class="form-input form-input--type2" name="delete-profile-comment" id="delete-profile-comment" placeholder="Напишите нам все, что думаете.." value="">
				</div>
			</div>

			<div class="gcell">
				<div class="grid">
					<div class="gcell _ml-auto _pr-mg _flex _items-center">
						<button class="button button--empty popup-dismiss">
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
									Удалить
								</span>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
