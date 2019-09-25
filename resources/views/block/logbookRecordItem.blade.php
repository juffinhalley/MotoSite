	<div class="grid grid--1">
		<div class="gcell _flex _items-center _mb-ms">
			<span class="title title--dark title--normal title--xs">
				Фотография:
			</span>
			<div class="logbook-record-preimg">
				<img src="{{ URL::asset('images/logo_record_preimg_70x50.jpg') }}" alt="" title="">
				<div class="logbook-record-preimg__delete">
					@svg('cross')
				</div>
			</div>
		</div>
		<div class="gcell _mb-ms">
			<label for="logbook-record-nop" class="title title--dark title--normal title--xs">
			Название фотографии:
			</label>
		</div>
		<div class="gcell _mb-ms">
			<div class="form-item">
				<input type="text" id="logbook-record-nop" class="form-input form-input--lgm" name="logbook-record-nop" placeholder="Мотоцикл">
			</div>
		</div>
		<div class="gcell _mb-ms">
			<label for="logbook-record-cop" class="title title--dark title--normal title--xs">
			Комментарий к фотографии:
			</label>
		</div>
		<div class="gcell _mb-ms">
			<div class="form-item">
				<textarea data-rule-minlength="9" data-rule-maxLength="100"
				 name="logbook-record-cop" id="logbook-record-cop"
				 class="form-textarea form-textarea--lgmta" rows="4">Таким образом, новая модель организационной деятельности играет важную роль в формировании экономической целесообразности принимаемых решений. Равным образом постоянный количественный рост и сфера нашей активности способствует повышению актуальности ключевых компонентов планируемого обновления сложившаяся структура организации напрямую зависит от существующих </textarea>
			</div>
		</div>
		<div class="gcell _mb-ms">
			<label for="logbook-record-top" class="title title--dark title--normal title--xs">
				Теги для фото:
			</label>
		</div>
		<div class="gcell _mb-ms">
			<div class="form-item">
				<input type="text" id="logbook-record-top" class="form-input form-input--lgm" name="logbook-record-top" placeholder="Напр.: Лето, мотоцикл, солнце">
			</div>
		</div>
	</div>
