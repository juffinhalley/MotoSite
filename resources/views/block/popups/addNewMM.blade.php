<form class="add-new-mm js-regular-block-toggler mfp-hide" id="add-new-mm" method="post" data-ajax="./hidden/response/demo.json" data-toggler-id="add-new-mm">

	<div class="grid grid--1">

		<div class="gcell _mb-sm">
			<label class="title title--normal title--xs title--grey2" for="mark-of-moto">
				Марка мотоцикла:
			</label>
		</div>
		<div class="gcell _mb-sm">
			<div class="form-item">
				<input type="text" class="form-input form-input--ms form-input--blGrey" name="mark-of-moto" id="mark-of-moto" value="BMW">
			</div>
		</div>

		<div class="gcell _mb-sm">
			<label class="title title--normal title--xs title--grey2" for="mark-of-moto">
				Модель мотоцикла:
			</label>
		</div>
		<div class="gcell _mb-sm">
			<div class="form-item">
				<input type="text" class="form-input form-input--ms form-input--blGrey" name="model-of-moto" id="model-of-moto" value="R nine T pure">
			</div>
		</div>

		<div class="gcell _mb-sm">
			<label class="title title--normal title--xs title--grey2" for="moto-comment">
				Комментарий:
			</label>
		</div>
		<div class="gcell _mb-mg">
			<div class="form-item">
				<textarea data-rule-minlength="9" name="moto-comment" id="moto-comment" class="form-textarea form-textarea--ms form-textarea--blGrey"></textarea>
			</div>
		</div>

		<div class="gcell _mt-def">
			<div class="grid">
				<div class="gcell _ml-auto">
					<button class="button button--def button--grey2right paper-button paper-button--hover" data-ripple-color="#b7b7b7">
						<div class="button__content">
							<span class="button__text">
								Отмена
							</span>
						</div>
					</button>
				</div>
				<div class="gcell">
					<button data-mfp-src="#added-new-mm" class="button button--def button--lgrey paper-button paper-button--hover simple-ajax-popup popup-default" data-ripple-color="#b7b7b7">
						<div class="button__content">
							<span class="button__text">
								Отправить
							</span>
						</div>
					</button>
				</div>
			</div>
		</div>

	</div>
</form>
