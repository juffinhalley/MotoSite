<div class="popup-form popup-form--center mfp-hide" id="change-email-popup">
	<form class="js-form" method="post" data-ajax="./hidden/response/demo.json" id="js-change-email">
		<div class="grid grid--1">
			<div class="gcell _flex _justify-center _mb-lg">
				<span class="title title--dark title--light title--ms">Изменение E-mail</span>
			</div>

			<div class="gcell _mb-lg">
				<div class="form-item">
					<label class="form-caption" for="old-email">
						Введите старый e-mail
					</label>

					<input type="text" required data-rule-email="true" class="form-input form-input--type2" name="old-email" id="old-email" value="">
				</div>
			</div>

			<div class="gcell _mb-lg">
				<div class="form-item form-item--wiconr form-item--2label">
					<label class="form-caption" for="change-email-password">
						Введите пароль
					</label>
					<input type="password" required data-rule-minLength="5" data-rule-password="true" class="form-input form-input--type2" name="change-email-password" id="change-email-password" value="" data-password-input>
					<label for="change-email-password" class="form-icon form-icon--ms" data-password-input-changer>
						@svg('eye')
					</label>
				</div>
			</div>

			<div class="gcell _mb-lg">
				<div class="form-item form-item--wiconr form-item--2label">
					<label class="form-caption" for="new-email">
						Введите новый e-mail
					</label>
					<input data-rule-equalto="[name='re-new-email']" type="text" required data-rule-email="true" class="form-input form-input--type2 form-input--trtogr" name="new-email" id="new-email" value="">
					<label for="new-email" class="form-icon form-icon--ms">
						@svg('okay')
					</label>
				</div>
			</div>

			<div class="gcell _mb-mg">
				<div class="form-item form-item--wiconr form-item--2label">
					<label class="form-caption" for="re-new-email">
						Повторите новый e-mail
					</label>
					<input data-rule-equalto="[name='new-email']" data-rule-email="true" required type="text" class="form-input form-input--type2 form-input--trtogr" name="re-new-email" id="re-new-email" value="">
					<label for="re-new-email" class="form-icon form-icon--ms">
						@svg('okay')
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
