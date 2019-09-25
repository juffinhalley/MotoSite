<?php
	$blData = [
		[
			"text" => "Давид Таргамадзе",
			"index" => "1",
			"restore" => "black-list-item__restore"
		]
	];
?>
<div class="popup-form popup-form--ms popup-form--pnone popup-form--center mfp-hide" id="delete-bl-item-popup">

	<div class="grid grid--1">

		<div class="gcell _mb-lg">
			<div class="grid">

				<div class="gcell _mr-auto _plr-xl _pt-xl _pb-sm">
					<span class="title title--dark title--normal title--ms">
						Удалить из черного списка
					</span>
				</div>

				<div class="gcell">
					<button class="button button--close button--mgsq paper-button paper-button--hover popup-dismiss" data-ripple-color="#b7b7b7">
						<div class="button__content">
							@svg('cross')
						</div>
					</button>
				</div>

			</div>
		</div>

		@foreach ($blData as $item)
		<div class="gcell _plr-xl _mb-xl">
			@include('block.blackListItem')
		</div>
		@endforeach

		<div class="gcell _mb-xl">
			<div class="grid _mr-mg">
				<div class="gcell _ml-auto _pr-mg _flex _items-center">
					<button class="button button--empty popup-dismiss">
						<div class="button__content">
							<span class="button__text">
								Отмена
							</span>
						</div>
					</button>
				</div>
				<div class="gcell">
					<button class="button button--def button--llGrey paper-button paper-button--hover" data-ripple-color="#b7b7b7">
						<div class="button__content">
							<span class="button__text">
								Удалить
							</span>
						</div>
					</button>
				</div>
			</div>
		</div>

	</div>
</div>
