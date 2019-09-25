
<div class="user-photo-item"{{ $video ? ' data-video-id="videoid1"' : ' data-photo-id="photoid1"' }}>
	<div class="user-photo-item__assets">
		<div class="user-photo-item__text">
			Путишествие
		</div>

		<div class="assets-button-block{{ $video ? ' js-user-video-edit' : ' js-user-photo-edit' }}">
			@svg("pen")
		</div>

		<div class="assets-button-block{{ $video ? ' js-user-video-remove' : ' js-user-photo-remove' }}">
			@svg("cross")
		</div>
	</div>

	<div class="user-photo-item__image">
		<img src="{{ URL::asset('images/user_gallery_photo_175x146.jpg') }}">

		@if ($video)
		<span class="user-photo-item__video-decor">
			@svg("play")
		</span>
		@endif
	</div>

	<div class="user-photo-item__descr">
		<div class="widget-button-block">
			@svg("eye")

			<span>6341</span>
		</div>

		<div class="widget-button-block">
			@svg("heart")

			<span>3219</span>
		</div>
	</div>
</div>
