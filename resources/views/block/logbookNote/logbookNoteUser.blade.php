	<div class="logbook-note-user">

		<div class="logbook-note-user__top">

			<div class="logbook-note-user__avatar">
				<img src="{{ URL::asset('images/profile_50x50.jpg') }}" alt="" title="">
			</div>

			<div class="logbook-note-user__info-wrapper">
				<div class="logbook-note-user__info-top">
					<a href="#" class="logbook-note-user__name">
						<span>Александр Зинченко</span>
					</a>
					<a href="#" class="logbook-note-user__geo">
						@svg('marker')
						<span>Херсон,UA</span>
					</a>
				</div>
				<div class="logbook-note-user__info-bottom">
					<div class="logbook-note-user__motorcycles">
						Я езжу на <span>Yamaha YZF-R3A</span> и <span>Honda CBR 250 RR</span>
					</div>
				</div>
			</div>

			<div class="logbook-note-user__date">
				Опубликовано <span>14.06.2017</span>
			</div>
		</div>


		<div class="logbook-note-user__bottom">

			<div class="logbook-note-user__buttons">
				<a href='#' class="button paper-button paper-button--hover button--default button--mdn" data-ripple-color="#b7b7b7">
					<div class="button__content">
						@svg('heart')
						<span class="button__text">Нравится</span>
					</div>
				</a>
				<a href='#' class="button paper-button paper-button--hover button--default button--mdn" data-ripple-color="#b7b7b7">
					<div class="button__content">
						@svg('comment')
						<span class="button__text">Комментировать</span>
					</div>
				</a>
			</div>

			<div class="logbook-note-user__counters">
				<div class="widget-button-block _flxsh0">
					@svg('eye')
					<span>3245</span>
				</div>
				<div class="widget-button-block _flxsh0">
					@svg('heart')
					<span>29</span>
				</div>
				<div class="widget-button-block _flxsh0">
					@svg('comment')
					<span>7</span>
				</div>
			</div>

		</div>

	</div>
