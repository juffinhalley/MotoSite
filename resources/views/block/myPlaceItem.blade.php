<div class="my-place-item">

	<div class="my-place-item__left-col">

		<div class="my-place-item__place-image">
			<div class="my-place-item__top">
				@svg('star')
				<span class="my-place-item__top-current">
					4.9
				</span>
				<span class="my-place-item__top-all">
					из <span>5</span> (<span>17</span>)
				</span>
			</div>
			<img src="{{ URL::asset('images/my-place-item_280x146.jpg') }}" alt="">
		</div>

		<a href="#" class="my-place-item__place-geo">
			@svg('marker')
			<span>Херсон,UA</span>
		</a>

	</div>


	<div class="my-place-item__right-col">

		<a href="#" class="my-place-item__title" title="Интересное место Чудо-дом">
			<span>Интересное место &laquo;Чудо-дом&raquo;</span>
		</a>
		<div class="my-place-item__center-row">
			<div class="my-place-item__place-info">
				<div class="my-place-item__place-info-part">
					<span>Веб-сайт:</span>
					<a href="#" title="our-super-long-website.com">our-super-long-website.com</a>
				</div>
				<div class="my-place-item__place-info-part">
					<span>Время работы:</span>
					<span title="09:00 - 17:00, пн-п">09:00 - 17:00, пн-пт</span>
				</div>
			</div>
			<div class="my-place-item__user">
				<a href="#" class="my-place-item__user-image">
					<img src="{{ URL::asset('images/profile_60x60.jpg') }}" alt="">
				</a>
				<div class="my-place-item__user-info">
					<a href="#" title="Михаил Булгаков" class="my-place-item__user-name">
						Михаил Булгаков
					</a>
					<div class="my-place-item__user-reg" title="С нами с 27.05.2017">
						С нами с <span>27.05.2017</span>
					</div>
				</div>
			</div>
		</div>
		<div class="my-place-item__bottom-row">
			<a href="#" class="my-place-item__arrow">
				@svg('arrowFullRight')
			</a>
			<div class="my-place-item__counters">
				@include('widget.statisticCounters')
			</div>
		</div>
	</div>
</div>
