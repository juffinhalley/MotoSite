<?php
	$dlphoto = [
		[
			"id" => "1"
		],
		[
			"id" => "2"
		],
		[
			"id" => "3"
		],
		[
			"id" => "4"
		],
		[
			"id" => "5"
		],
		[
			"id" => "6"
		],
		[
			"id" => "7"
		],
		[
			"id" => "8"
		],
		[
			"id" => "9"
		],
		[
			"id" => "10"
		],
		[
			"id" => "11"
		],
		[
			"id" => "12"
		]
	]
?>

<div class="add-photo">

	<div class="add-photo__wrapper-top">
		<div class="add-photo__title">
			Добавление фотографии
		</div>
		<div class="add-photo__close">
			<button class="button button--close button--mgsq paper-button paper-button--hover" data-ripple-color="#b7b7b7">
				<div class="button__content">
					@svg('cross')
				</div>
			</button>
		</div>
	</div>

	<a href="#" class="add-photo__download">
		@svg('plus')
		<span>Загрузить фотографию</span>
	</a>

	<div class="add-photo__wrapper">

			<div class="grid grid--3 grid--hspace--xl _mb-xl">
				@for ($i = 0; $i < 3; $i++)
					<div class="gcell">
						@include ('block.dlPhotoItem', ['albumCover' => ''])
					</div>
				@endfor
			</div>

		<div class="grid grid--3">
			<div class="gcell"></div>
			<div class="gcell">
				<div class="show-more-button-wrapper show-more-button-wrapper--mpnone">
					<button class="button paper-button paper-button--hover button--showmore button--smd button--w100 js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
						<div class="button__content">
							<span class="button__text">Показать ещё 3 альбома</span>
							<span class="button__icon">
								@svg('arrowBottom')
							</span>
						</div>
						<div class="paper-ripple">
							<div class="paper-ripple__background"></div>
							<div class="paper-ripple__waves"></div>
						</div>
					</button>
				</div>
			</div>
			<div class="gcell"></div>
		</div>

		<div class="add-photo__spacer"></div>

		<div class="grid grid--4 grid--hspace-xl grid--vspace-xl">
			@foreach ($dlphoto as $item)
				<div class="gcell">
					@include ('block.dlPhotoItem', ['pick' => ''])
				</div>
			@endforeach
		</div>

		<div class="add-photo__spacer add-photo__spacer--nt"></div>

		<div class="add-photo__button">
			<button class="button button--default button--18036 paper-button paper-button--hover" data-ripple-color="#b7b7b7">
				<div class="button__content">
					<span class="button__text">
						Добавить
					</span>
				</div>
			</button>
		</div>
	</div>
</div>
