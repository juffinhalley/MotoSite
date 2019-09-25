<div class="popup-form popup-form--center mfp-hide" id="change-id-popup">
	<form class="js-form" method="post" data-ajax="./hidden/response/demo.json">

		<div class="grid grid--1">

			<div class="gcell _flex _justify-center _mb-lg">
				<span class="title title--dark title--light title--ms">Изменение id пользователя</span>
			</div>

			<div class="gcell _mb-lg">
				<div class="form-item form-item--wiconr form-item--2label">
					<label class="form-caption" for="new-id">
						Введите новый id
					</label>
					<input required type="text" data-rule-minLength="5" data-rule-maxLength="11" class="form-input form-input--type2 form-input--trtogr" name="new-id" id="new-id" value="TheSh3dow">
					<label for="new-id" class="form-icon form-icon--ms">
						@svg('okay')
					</label>
				</div>
			</div>
			<div class="gcell _mb-mg">
				<span class="text text--sm text--grey5">
					Примечание: id можно поменять не чаще, чем 1 раз в месяц
				</span>
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
