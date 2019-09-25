

<section class="widget">
	<div class="articles-list">
		@for ($i = 0; $i < 5; $i++)
		<div class="articles-list-item">
			<div class="articles-list-item__image-row">
				<a href='#' class="articles-list-item__image">
					<img src="{{ URL::asset('images/articles_item_320x180.jpg') }}" alt="" title="">
				</a>

				<div class="articles-list-item__achivments">
					<div class="articles-list-item__achivment">
						@svg('trophy')
					</div>
					<div class="articles-list-item__achivment">
						@svg('trophy')
					</div>
				</div>

				<div class="articles-list-item__descr">
					<div class="widget-button-block">
						@svg('eye')

						<span>231</span>
					</div>
					<div class="widget-button-block">
						@svg('heart')

						<span>6341</span>
					</div>
					<div class="widget-button-block">
						@svg('comment')

						<span>99</span>
					</div>
				</div>
			</div>

			<div class="articles-list-item__content">
				<a href='#' class="articles-list-item__name">
					Обзор мотоцикла YAMAHA YZF-R3A
				</a>

				<div class="articles-list-item__row">
					<div class="articles-list-item__author">
						Автор: Михаил Булгаков
					</div>

					<div class="articles-list-item__date">
						17.06.17
					</div>
				</div>

				<div class="articles-list-item__text">
						Практический опыт показывает, что повышение уровня гражданского сознания способствует подготовке и реализации всесторонне сбалансированных нововведений. 
						Практический опыт показывает, что повышение уровня гражданского сознания способствует подготовке и реализации всесторонне сбалансированных нововведений. 
						Задача организации, в особенности же начало повседневной работы по формированию позиции требует определения и уточнения всесторонне сбалансированных нововведений. Не следует, однако, забывать о том, что консультация с профессионалами из IT способствует подготовке и реализации существующих финансовых и административных условий. Значимость этих проблем 
						настолько очевидна, что социально-экономическое развитие способствует подготовке и реализации дальнейших направлений развитая системы массового участия... 
				</div>	

				<div class="articles-list-item__button">
					<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
						<div class="button__content">
							<span class="button__text">Читать</span>
						</div>
					</a>
				</div>
			</div>
		</div>
		@endfor
	</div>
</section>
