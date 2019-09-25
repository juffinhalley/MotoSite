<div class="moto-user">

	<a href="#" class="moto-user__avatar">
		<img src=" {{ URL::asset('images/profile_50x50.jpg') }}" alt="" title ="">
	</a>

	<div class="moto-user__info-wrapper">
		<div class="moto-user__name-geo-wrapper">
			<a href="#" class="moto-user__name">
				Александр Зинченко
			</a>
			<a href="#" class="moto-user__geo">
				@svg("marker")
				<span>Херсон,UA</span>
			</a>
		</div>
		<div class="moto-user__motorcycles">
			Я езжу на <span>Yamaha YZF-R3A</span> и <span>Honda CBR 250 RR</span>
		</div>
	</div>

		<div class="moto-user__buttons">
			<a href='#' class="button paper-button paper-button--hover button--default button--mdn" data-ripple-color="#b7b7b7">
				@if (isset($notSelf))
					<div class="button__content">
						@svg("heart")
						<span class="button__text">
							Нравится
						</span>
					</div>
				@else
					<div class="button__content">
						@svg("pen")
						<span class="button__text">
							Редактировать
						</span>
					</div>
				@endif

			</a>
			<a href='#' class="button paper-button paper-button--hover button--default button--mdn" data-ripple-color="#b7b7b7">
				@if (isset($notSelf))
					<div class="button__content">
						@svg("comment")
						<span class="button__text">
							Комментировать
						</span>
					</div>
				@else
					<div class="button__content">
						@svg("cross")
						<span class="button__text">
							Удалить
						</span>
					</div>
				@endif
			</a>
		</div>
</div>
