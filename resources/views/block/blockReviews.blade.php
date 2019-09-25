<div class="block-reviews">
	<div class="block-reviews__top">
		<div class="block-reviews__title">
			{{ $reviews['title'] }}
		</div>
		<div class="block-reviews__button">
			<button class="button button--lmd paper-button paper-button--hover button--default" data-ripple-color="#b7b7b7">
				<div class="button__content">
					<span class="button__text">Оценить место</span>
				</div>
			</button>
		</div>
	</div>
	<div class="block-reviews__showmore">
		<button class="button paper-button paper-button--hover button--lgmd button--showmore-t2 js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
			<div class="button__content">
				<span class="button__text">
					Показать все
				</span>
			</div>
			<div class="paper-ripple">
				<div class="paper-ripple__background"></div>
				<div class="paper-ripple__waves"></div>
			</div>
		</button>
	</div>
	<div class="block-reviews__content">
		@include('block.review')
	</div>
</div>
