<div class="moto-user-data" data-tabs>

	<div class="moto-user-data__top-wrapper">
		<div class="moto-user-data__switch-button" data-tabs-button="1">
			Отзыв владельца
		</div>
		<div class="moto-user-data__switch-button is-active" data-tabs-button="2">
			Паспортные данные
		</div>
		@if (isset($self))
		<div class="moto-user-data__switch-button" data-tabs-button="3">
			История владения
		</div>
		@endif
		<div class="moto-user-data__counters">
			<div class="widget-button-block">
				@svg('trophy')
				<span>13</span>
			</div>
			<div class="widget-button-block _flxsh0">
				@svg('eye')
				<span>3245</span>
			</div>
			<div class="widget-button-block _flxsh0">
				@svg('heart')
				<span>9</span>
			</div>
			<div class="widget-button-block _flxsh0">
				@svg('comment')
				<span>7</span>
			</div>
		</div>
	</div>

	<div class="moto-user-data__passport-review">

		<div class="moto-user-data__switch-item" data-tabs-container="1">
			<div class="moto-user-data__owner-review">
				<span>О мотоцикле в целом:</span>
				Мотоцикл очень крут. Покупался в салоне Yamaha в декабре 2016г. Таким образом, новая модель организационной деятельности играет важную роль в формировании экономической целесообразности принимаемых решений. Равным образом постоянный
				количественный рост и сфера нашей активности способствует повышению актуальности ключевых компонентов планируемого обновления. С другой стороны сложившаяся структура организации напрямую зависит от существующих финансовых и административных
				условий.
			</div>
		</div>

		<div class="moto-user-data__switch-item is-active" data-tabs-container="2">
			<div class="moto-user-data__passport-details">
				<div class="moto-user-data__parameters">
					<span>Тип транспорта: </span>
					<span>Спортбайк</span>
				</div>
				<div class="moto-user-data__parameters">
					<span>Модель: </span>
					<span>Yamaha YZF R3</span>
				</div>
				<div class="moto-user-data__parameters">
					<span>Год: </span>
					<span>2016</span>
				</div>
				<div class="moto-user-data__parameters">
					<span>Объём двигателя: </span>
					<span>320 куб. см.</span>
				</div>
				<div class="moto-user-data__parameters">
					<span>Двигатель: </span>
					<span>4х тактный</span>
				</div>
				<div class="moto-user-data__parameters">
					<span>Состояние: </span>
					<span>Гаражное хранение, Первый владелец, Не бит, Не крашен</span>
				</div>
				<div class="moto-user-data__parameters">
					<span>Безопасность: </span>
					<span>ABS, Ветровое стекло</span>
				</div>
				<div class="moto-user-data__parameters">
					<span>Комфорт: </span>
					<span>Бортовой компьютер</span>
				</div>
			</div>
		</div>
		@if (isset($self))
		<div class="moto-user-data__switch-item" data-tabs-container="3">
			<div class="moto-user-data__history">
				<div class="moto-user-data__open-history">
					<div class="onoff-switch _mr-def">
						<input type="checkbox" class="onoff-switch__checkbox" id="005" checked>
						<label class="onoff-switch__label" for="005">
							<span class="onoff-switch__inner">
								<span class="onoff-switch__inner-on">да</span>
								<span class="onoff-switch__inner-off">нет</span>
							</span>
							<span class="onoff-switch__switch"></span>
						</label>
					</div>
					<span>
						Открыть доступ к истории всем пользователям?
					</span>
				</div>
				<div class="moto-user-data__moto-history">
					<div class="moto-user-data__history-item">
						@include('block.ownerItem')
						<div class="moto-user-data__history-year">
							2016
						</div>
					</div>
					<div class="moto-user-data__history-item">
						@include('block.ownerItem')
						<div class="moto-user-data__history-year">
							2013
						</div>
					</div>
				</div>
				<div class="moto-user-data__history-start">
					<div class="moto-user-data__history-decore"></div>
					<div class="moto-user-data__start">
						Мотоцикл выпущен на заводе производителя
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>

</div>
