<section class="widget">

	<div class="main-battles {{ isset($draw) ? 'main-battles--draw' : '' }}">
		<a href="#" class="main-battles__title">
			<span class="regular-text regular-text--t2">
				Yamaha YZF R3A «Thunder» vs Honda CBR 250 RR «Smoker»
			</span>
		</a>

		<div class="main-battles__main">
			<div class="main-battles__battle-date">

				@if (isset($battling))
				До конца батла <span> 03:29:19</span>
				@else
				Батл завершен <span> 15.05.18</span>
				@endif

			</div>

			<div href="#" class="main-battles__battle-decor {{ isset($battling) ? 'is-active' : '' }}">
				@svg("battle")
			</div>

			<div class="main-battles__item {{ isset($win1) ? 'is-winner' : '' }}">

				@if (isset($win1))
					<div class="main-battles__item-winner-content">
						@svg('trophy')
						<span>победитель</span>
					</div>
				@endif
				@if (isset($draw))
					<div class="main-battles__item-winner-content">
						@svg('trophy')
						<span>ничья</span>
					</div>
				@endif


				<a href="#" class="main-battles__image">
					<img src="{{ URL::asset('images/battles_image2_426x276.jpg') }}" alt="" title="">
				</a>
				<div class="main-battles__item-descr">
					<a href='#' class="main-battles__item-name">
						Yamaha YZF R3A «Thunder»
					</a>

					<div class="main-battles__item-wrapper">
						<div class="main-battles__item-stat">
							+37
						</div>

						<div class="main-battles__item-battle">
							@svg("battle")
							<span>7</span>
						</div>
					</div>

				</div>
			</div>

			<div class="main-battles__item {{ isset($win2) ? 'is-winner' : '' }}">

				@if (isset($win2))
					<div class="main-battles__item-winner-content win2">
						@svg('trophy')
						<span>победитель</span>
					</div>
				@endif
				@if (isset($draw))
					<div class="main-battles__item-winner-content win2">
						@svg('trophy')
						<span>ничья</span>
					</div>
				@endif

				<a href="#" class="main-battles__image">
					<img src="{{ URL::asset('images/battles_image_426x276.jpg') }}" alt="" title="">
				</a>
				<div class="main-battles__item-descr">

					<a href='#' class="main-battles__item-name">
						Honda CBR 250 RR «Smoker»
					</a>

					<div class="main-battles__item-wrapper">
						<div class="main-battles__item-stat">
							+25
						</div>

						<div class="main-battles__item-battle">
							@svg("battle")
							<span>6</span>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</section>
