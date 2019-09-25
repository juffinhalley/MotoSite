<div class="modal">
	<form class="js-form popup-form popup-form--ms" method="post" data-ajax="./hidden/response/demo.json">

		<div class="grid grid--1">

			<div class="gcell _flex _justify-center _mb-lg _text-center">
				<span class="title title--dark title--light title--ms">Для подтверждения нового телефона введите код из смс, отправленного на данный номер</span>
			</div>

			<div class="gcell _mb-mg">
				<div class="form-item">
					<label class="form-caption" for="code-telephone-confirm">
						Введите код
					</label>
					<input required type="text" data-rule-minLength="6" data-rule-maxLength="12" class="form-input form-input--type2" name="code-telephone-confirm" id="code-telephone-confirm" value="">
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
