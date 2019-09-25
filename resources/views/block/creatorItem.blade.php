<div class="creator-item">
	<div class="creator-item__image">
		<img src="{{ URL::asset('images/profile_70x70.jpg') }}" alt="">
	</div>
	<div class="creator-item__info">
		<div class="creator-item__title">
			{{ $item['title'] }}
		</div>
		<div class="creator-item__date">
			С нами с {{ $item['date'] }}
		</div>
	</div>
</div>
