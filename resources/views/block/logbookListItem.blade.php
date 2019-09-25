@if (isset($square))
	<div class="logbook-list-item logbook-list-item--square">
		<div class="logbook-list-item__decore"></div>
		<div class="logbook-list-item__image">
			<img src="{{ URL::asset('images/logbook_item_300x240.jpg') }}" alt="" title="">
		</div>

		<div class="logbook-list-item__wrapper">
			<div class="logbook-list-item__wrapper-title">
				<div class="logbook-list-item__name">
					Теперь все стало еще лучше.
				</div>

				<div class="logbook-list-item__date">
					Опубликовано <span>24.06.2017</span>
				</div>
			</div>
				<div class="logbook-list-item__text">
					Мотоцикл очень крут. Таким образом, новая модель организационной деятельности играет важную роль в формировании экономической целесообразности принимаемых решений.
					С другой стороны сложившаяся структура организации напрямую зависит от существующих финансовых и административных условий..
				</div>
				<div class="logbook-list-item__counters-button">
					<div class="logbook-list-item__button">
						@svg('arrowFullRight')
					</div>
					<div class="logbook-list-item__counters">
						@include('widget.statisticCounters')
					</div>
				</div>
		</div>
	</div>

@else
<div class="logbook-list-item">
	<div class="logbook-list-item__decore"></div>
	<div class="logbook-list-item__image">
		<img src="{{ URL::asset('images/logbook_image1_254x254.jpg') }}" alt="" title="">
	</div>

	<div class="logbook-list-item__wrapper">
		<div class="logbook-list-item__wrapper-title">
			<div class="logbook-list-item__name">
				Теперь все стало еще лучше.
			</div>

			<div class="logbook-list-item__date">
				Опубликовано <span>24.06.2017</span>
			</div>
		</div>
			<div class="logbook-list-item__text">
				Мотоцикл очень крут. Таким образом, новая модель организационной деятельности играет важную роль в формировании экономической целесообразности принимаемых решений.
				С другой стороны сложившаяся структура организации напрямую зависит от существующих финансовых и административных условий..
			</div>

			<div class="logbook-list-item__wrapper-social-button">
				<div class="logbook-list-item__more-widget">
					<div class="widget-button-block widget-button-block--nomgl">
						@svg('eye')
						<span>267</span>
					</div>

					<div class="widget-button-block">
						@svg('heart')
						<span>2</span>
					</div>

					<div class="widget-button-block">
						@svg('comment')
						<span>3</span>
					</div>
				</div>

					<a href='/' class="button paper-button paper-button--hover button--whiteborder button--md" data-ripple-color="#b7b7b7">
						<div class="button__content">
							<span class="button__text">Подробней</span>
						</div>
					</a>
			</div>
	</div>
</div>
@endif
