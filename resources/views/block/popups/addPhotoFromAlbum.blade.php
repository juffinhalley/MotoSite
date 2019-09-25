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

<div class="add-photo add-photo--from-album">

	<div class="add-photo__wrapper-top">
		<div class="add-photo__title">
			Добавление фотографии <span>из альбома &laquo;Антарктида&raquo;</span>
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
