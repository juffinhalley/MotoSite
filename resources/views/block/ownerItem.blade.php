<div class="owner-item {{ isset($userFilter) ? 'owner-item--user-filter' : '' }}">
	<div class="owner-item__left-col">
		<div class="owner-item__top-row">
			<div class="owner-item__image">
				<img src="{{ URL::asset('images/avatar_100x100.jpg') }}" alt="">
				@if (isset($userFilter))
					<div class="owner-item__image-top">
						@svg('needMoreIcons')
						<span>1</span>
					</div>
				@else
					<div class="owner-item__image-rep">
						<span>+16</span>
					</div>
				@endif
			</div>
			<div class="owner-item__info">
				<div class="owner-item__name">
					<span>Александр Зинченко</span>
					@svg('needMoreIcons')
				</div>
				<div class="owner-item__info-item">
					@svg('marker')
					<span>Херсон,UA</span>
				</div>
				<div class="owner-item__info-item">
					@svg('helmet')
					<span>Yamaha YZF-R3A и <a href="#">ещё 2</a></span>

				</div>
				<div class="owner-item__info-item">
					@svg('users')
					<span>Member в &laquo;MCC Yamaha&raquo;</span>
				</div>
			</div>
		</div>
		<div class="owner-item__bottom-row">
			<div class="owner-item__button">
				<button class="button paper-button paper-button--hover button--type-3 button--md" data-ripple-color="#b7b7b7">
					<div class="button__content">
						<span class="button__text text text--sm">Смотреть профиль</span>
					</div>
				</button>
			</div>
			<div class="owner-item__date">
				На сайте с <span>25.01.2018</span>
			</div>
		</div>
	</div>
	@if (isset($userFilter))
		<div class="owner-item__right-col">
			<div class="owner-item__statistic">
				<div class="owner-item__statistic-item">
					<span>Фотографии:</span>
					<span>14</span>
				</div>
				<div class="owner-item__statistic-item">
					<span>Видеозаписи:</span>
					<span>5</span>
				</div>
				<div class="owner-item__statistic-item">
					<span>Статьи:</span>
					<span>0</span>
				</div>
				<div class="owner-item__statistic-item">
					<span>Комментарии:</span>
					<span>22</span>
				</div>
				<div class="owner-item__statistic-item">
					<span>Участие в событиях:</span>
					<span>2</span>
				</div>
			</div>
			<div class="owner-item__online">
				online
			</div>
		</div>
	@endif

</div>
