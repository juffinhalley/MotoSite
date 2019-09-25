
<section class="widget">
	<div class="user-events-block">
		<div class="user-events-block__grid">
			<div class="events-block">
				<div class="events-block__decor"></div>

				@for ($i = 0; $i < 15; $i++)
				<a href='#' class="events-block__item">
					<div class="events-block__item-date">
						<span>09.05</span> 
						<span>2017</span>
					</div>

					<div class="events-block__item-name">Мотопробег из Херсона в Прагу</div>

					<div class="events-block__item-image">
						<img src="{{ URL::asset('images/events_image_100x50.jpg') }}" alt="" title="">
					</div>
				</a>
				@endfor
			</div>
		</div>
	</div>
</section>
