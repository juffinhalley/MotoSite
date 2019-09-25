
<section class="widget">
	<div id='js-map-settups' class="map-settups">
		<div class="map-settups__row _mgb30">
			<div class="map-settups__el">
		        <div class="form-item form-item--wicon">
					<input type="text" placeholder="Откуда" class="form-input form-input--lg" id="js-google-input-from" name="" data-error-text="Выберите точку отбытия">

					<label for="" class="form-icon">
						@svg('marker')
					</label>
				</div>
			</div>

			<div class="map-settups__spacer">
				@svg('spacer-arrows')
			</div>

			<div class="map-settups__el">
		        <div class="form-item form-item--wicon">
					<input type="text" placeholder="Куда" class="form-input form-input--smg" id="js-google-input-to" name="" data-error-text="Выберите точку назначения">

					<label for="" class="form-icon">
						@svg('marker')
					</label>
				</div>
			</div>

			<div class="map-settups__spacer map-settups__spacer--sm"></div>

			<div class="map-settups__button">
				<button id="js-map-waypoint-button" class="button paper-button paper-button--hover button--second button--lgm button--w100" data-ripple-color="#e3e3e3">
                	<div class="button__content">
                		<span class="button__text">Проложить маршрут</span>
                	</div>
                </button>
			</div>
		</div>

		<div class="map-settups__row _mgb40">
			<div class="map-settups__el map-settups__el--lg">
		        <div class="form-item form-item--wicon">
					<input type="text" placeholder="Введите область" class="form-input form-input--lg" id="js-google-input-area" name="">

					<label for="js-google-input-area" class="form-icon">
						@svg('marker')
					</label>
				</div>
			</div>

			<div class="map-settups__spacer">
				или
			</div>

			<div class="map-settups__el">
		        <div class="form-item form-item--wicon">
					<input type="text" placeholder="Шоссе" class="form-input form-input--lg" id="js-shose-input" name="">

					<label for="js-shose-input" class="form-icon">
						@svg('shose')
					</label>
				</div>
			</div>

			<div class="map-settups__spacer">
				@svg('spacer-arrows')
			</div>

			<div class="map-settups__el map-settups__el--sm">
		        <div class="form-item form-item--wicon">
					<input type="text" placeholder="Номер" class="form-input form-input--lg" id="js-shose-num-input" name="">

					<label for="js-shose-num-input" class="form-icon">
						@svg('shose')
					</label>
				</div>
			</div>
		</div>

		<div class="map-settups__row _mgb30">
			<div class="map-settups__el map-settups__el--mg">
				<div class="select-wrapper select-wrapper--multiple select-wrapper--mg select-wrapper--w100 select-wrapper--white">
					<select multiple class="js-choice-select" data-custom-choice="multiple" data-map-places="true">
						<option selected value="sto">СТО</option>
						<option selected value="gas">Заправка</option>
						<option selected value="salons">Мотосалоны</option>
						<option selected value="rests">Места отдыха</option>
						<option selected value="interest">Интересные места</option>
						<option selected value="meets">Места сбора</option>
						<option selected value="motoschools">Мотошколы</option>
						<option selected value="services">Мотосервис</option>
					</select>
				</div>
			</div>

			<div class="map-settups__button _mgla">
				<button class="button paper-button paper-button--hover button--second button--lgm button--w100" data-ripple-color="#e3e3e3">
                	<div class="button__content">
                		<span class="button__text">Добавить место</span>
                	</div>
                </button>
			</div>
		</div>

		<div class="map-settups__row">
			<div class="map-settups__el map-settups__el--w100">
		        <div id='js-map-conformations' class="map-conformations">
		        	<div class="map-conformations__button js-regular-block-toggler-button" data-toggler-id="map">
		        		<div class="map-conformations__icon">
		        			@svg("okay")
		        		</div>

		        		<span>
		        			Места ожидающие вашего подтверждения
		        		</span>
		        	</div>

		        	<div class="map-conformations__list js-regular-block-toggler" data-toggler-id="map">
		        		<div class="map-conformations__groups-name">
		        			<div class="map-conformations__name js-map-conf-button is-hidden" data-toggler-id="0">
		        				Мотосалон «WOG»
		        			</div>

		        			<div class="map-conformations__name js-map-conf-button" data-toggler-id="1">
		        				Мотосалон «Yamaha Kherson»
		        			</div>

		        			<div class="map-conformations__name js-map-conf-button" data-toggler-id="2">
		        				Отель «Лазурный берег»
		        			</div>
		        		</div>

		        		<div class="map-conformations__groups">
		        			@for ($i = 0; $i < 3; $i++)
		        			<div class="map-conformations__group js-map-conf-block{{ $i == 0 ? " is-active" : "" }}" data-toggler-id="{{ $i }}">
		        				@for ($e = 0; $e < 5; $e++)
		        				<div class="map-conformations__group-item">
			        				@svg("marker")

			        				<span class="map-conformations__group-text">
			        					ул. Гвардейская, 162, Олешки, Херсонская область, Украина
			        				</span>

			        				<span class="map-conformations__group-add"></span>
		        				</div>
		        				@endfor
		        			</div>
		        			@endfor
		        		</div>

		        		<div class="map-conformations__label">
		        			Для того чтобы место отобразилось на карте оно должно набрать минимум 10 лайков
		        		</div>
		        	</div>
		        </div>
			</div>
		</div>
	</div>
</section>
