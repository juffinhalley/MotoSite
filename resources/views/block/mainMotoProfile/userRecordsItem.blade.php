<div class="user-records-item">
	<div class="user-records-item__image">
		<img src="{{ URL::asset('images/logbook_item_200x150.jpg') }}" alt="" title="">
	</div>

	<div class="user-records-item__wrapper">
		<div class="user-records-item__info">
			<div class="user-records-item__name">
				Как же мне этого не хватало =)
			</div>
			<div class="user-records-item__time">
				05.06.2017
			</div>
		</div>
		<div class="user-records-item__counters-button">
			<div class="user-records-item__button">
				@svg('arrowFullRight')
			</div>
			<div class="user-records-item__counters">
				@include('widget.statisticCounters')
			</div>
		</div>
	</div>

	@if (isset($type2))
	<div class="user-records-item__image">
		<img src="{{ URL::asset('images/user_records_item_90x90.jpg') }}" alt="" title="">
	</div>

	<div class="user-records-item__wrapper">
		<div class="user-records-item__name">
			Как же мне этого не хватало =)
		</div>
		<div class="user-records-item__time">
			Опубликовано 05.06.2017
		</div>
	</div>

	<div class="user-records-item__wrapper-sb">
		<div class="user-records-item__wrapper-social">
			<div class="widget-button-block widget-button-block--nomgl">
				@svg('eye')
				<span>325</span>
			</div>

			<div class="widget-button-block">
				@svg('heart')
				<span>2</span>
			</div>

			<div class="widget-button-block">
				@svg('comment')
				<span>7</span>
			</div>
		</div>

		<div class="user-records-item__button">
			<a href='/' class="button paper-button paper-button--hover button--whiteborder button--lmd" data-ripple-color="#b7b7b7">
				<div class="button__content">
					<span class="button__text">Подробней</span>
				</div>
			</a>
		</div>
	</div>
	@endif
</div>
