<div class="black-list-item {{ $item['restore']}}">
	<div class="black-list-item__wrapper">
		<div class="black-list-item__image">
			<img src="{{ URL::asset('images/profile_60x60.jpg') }}" alt="" title="">
		</div>
		<div class="black-list-item__user-wrapper">
			<a href="#" class="black-list-item__user">
				{{ $item['text'] }}
			</a>
			<div class="black-list-item__geodate-wrapper">
				<a href="#" class="black-list-item__geo">
					@svg("marker")
					<span>Киев,UA</span>
				</a>
				<div class="black-list-item__date">
					<span>c 15.03.18</span>
				</div>
			</div>
		</div>
	</div>
	<div class="black-list-item__checkbox">
		<button data-mfp-src="#delete-bl-item-popup" class="button button--round paper-button paper-button--hover popup-default" name="{{ $item['index'] }}" id="{{ $item['index'] }}">
			@svg('cross')
		</button>
	</div>

</div>
