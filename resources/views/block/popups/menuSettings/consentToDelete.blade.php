<div class="modal">
	<form class="js-form popup-form popup-form--sm popup-form--plrnone" method="post" data-ajax="./hidden/response/demo.json">

		<div class="grid grid--1">

			<div class="gcell _flex _justify-center _mb-lg _text-center _plr-xl">
				<span class="title title--dark title--light title--ms">Вы действительно хотите удалить свою страницу?</span>
			</div>

			<div class="gcell _mb-lg _ptb-ms _plr-def _grey-bg">
				<div class="checkbox-alerts checkbox-alerts--default">
					<input class="checkbox-alerts__input" type="checkbox" name="onoff-geoalerts" id="onoff-geoalerts">
					<label class="checkbox-alerts__label" for="onoff-geoalerts">
						<div class="checkbox-alerts__icon">
							@svg('okay')
						</div>
						<span>Принимаю, что удаление профиля это безвозвратное действие, и восстановить страницу будет невозможно</span>
					</label>
				</div>
			</div>

			<div class="gcell _pr-mg">
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
