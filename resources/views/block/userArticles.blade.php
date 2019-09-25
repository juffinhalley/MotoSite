
<section class="widget">
	<div class="user-articles-block">
		<div class="user-articles-block__grid">
			@for ($i = 0; $i < 10; $i++)
			<div class="articles-item-block">
				<a href='#' class="articles-item-block__image">
					<img src="{{ URL::asset('images/article_image_250x80.jpg') }}" alt="" title="">
				</a>

				<div class="articles-item-block__descr">
					<div class="articles-item-block__row">
						<a href='#' class="articles-item-block__name">Обзор мотоцикла BMW R nine T Pure </a>

						<div class="articles-item-block__date">Опубликовано 17.06.2017</div>
					</div>

					<div class="articles-item-block__buttons">
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
							@svg("trophy")

							<span>9457</span>
						</div>
						
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