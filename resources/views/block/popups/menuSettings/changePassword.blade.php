<div class="popup-form popup-form--center mfp-hide" id="change-password-popup">
	<form class="js-form" method="post" data-ajax="./hidden/response/demo.json">

		<div class="grid grid--1">

			<div class="gcell _flex _justify-center _mb-lg">
				<span class="title title--dark title--light title--ms">Изменение пароля</span>
			</div>

			<div class="gcell _mb-lg">
				<div class="form-item form-item--wiconr form-item--2label">
					<label class="form-caption" for="old-password">
						Введите старый пароль
					</label>
					<input type="text" required data-rule-minLength="5" data-rule-password="true" class="form-input form-input--type2" name="old-password" id="old-password" value="">
					<label for="old-password" class="form-icon form-icon--ms">
						@svg('eye')
					</label>
				</div>
			</div>

			<div class="gcell _mb-lg">
				<div class="form-item form-item--wiconr form-item--2label">
					<label class="form-caption" for="new-password">
						Введите новый пароль
					</label>
					<input data-rule-equalto="[name='re-new-password']" type="password" required data-rule-minLength="5" data-rule-password="true" class="form-input form-input--type2" name="new-password" id="new-password" value="">
					<label for="new-password" class="form-icon form-icon--ms">
						@svg('eye')
					</label>
				</div>
			</div>

			<div class="gcell _mb-mg">
				<div class="form-item form-item--wiconr">
					<label class="form-caption" for="re-new-password">
						Введите новый пароль
					</label>
					<input data-rule-equalto="[name='new-password']" type="password" required data-rule-minLength="6" data-rule-password="true" class="form-input form-input--type2" name="re-new-password" id="re-new-password" value="">
					<label for="re-new-password" class="form-icon form-icon--ms">
						@svg('eye')
					</label>
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
									Изменить
								</span>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
