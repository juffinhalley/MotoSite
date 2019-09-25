<div class="review">
	<a href="#" class="review__image">
		<img src="{{ URL::asset('images/profile_50x50.jpg') }}" alt="">
	</a>
	<div class="review__info">
		<div class="review__info-top">
			<a href="#" class="review__name">
				Михаил Булгаков
			</a>
			<div class="review__rate">
				@for ($i=0; $i < 5; $i++)
					@svg('star')
				@endfor
			</div>
		</div>
		<div class="review__date">
			14.06.17
		</div>
		<div class="review__text">
			Был здесь, остались хорошие впечатления
		</div>
		<div class="review__features">
			<div class="review__features-item">
				@svg('plus')
				<div class="review__features-item-text">
					Профессионализм, видно, что парни занимаюся тем, что им по душе
				</div>
			</div>
		</div>
	</div>
</div>
