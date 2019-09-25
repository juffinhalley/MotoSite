

<section class="widget">
	<div class="user-announces-block">
		<div class="user-announces-block__grid">
			@for ($i = 0; $i < 10; $i++)
			<div class="announce-item-block">
				<a href='#' class="announce-item-block__image">
					<img src="{{ URL::asset('images/announce_image_250x120.jpg') }}" alt="" title="">
				</a>

				<div class="announce-item-block__descr">
					<div class="announce-item-block__row">
						<a href='#' class="announce-item-block__name">Мотоцикл BMW R nine T Pure</a>

						<div class="announce-item-block__date">Опубликовано 17.06.2017</div>
					</div>

					<div class="announce-item-block__infos">
						<div class="announce-item-block__info">Цена: 170000 грн</div>
						<div class="announce-item-block__info">Пробег: 20000 км</div>
						<div class="announce-item-block__info">Год выпуска: 2016</div>
					</div>

					<div class="announce-item-block__buttons">
						<button class="button paper-button paper-button--hover button--lred button--md button--icon-left" data-ripple-color="#b7b7b7">
                          <div class="button__content">
                            @svg("pen")
                            <span class="button__text">Изменить</span></div>
                        </button>
                        <button class="button paper-button paper-button--hover button--lred button--md button--icon-left" data-ripple-color="#b7b7b7">
                          <div class="button__content">
                            @svg("cross")
                            <span class="button__text">Удалить</span></div>
                        </button>
					</div>

					<div class="bottom-widgets-block">
						<div class="widget-button-block">
							@svg("mail")

							<span>9457</span>
						</div>

						<div class="widget-button-block">
							@svg("eye")

							<span>6341</span>
						</div>

						<div class="widget-button-block">
							@svg("comment")

							<span>3219</span>
						</div>
					</div>
				</div>
			</div>
			@endfor
		</div>
	</div>
</section>