<div class="create-actions__actions" data-switch>
	<div class="create-actions__buttons-switch">
		<div class="create-actions__button-on is-active" data-btn-on>
			@svg('plus')
		</div>
		<div class="create-actions__button-off" data-btn-off>
			@svg('cross')
		</div>
	</div>
	<div class="create-actions__buttons-switched" data-switch-cont>
		<a href="#" class="create-actions__button-add-photo">
			@svg('camera')
		</a>
		<a href="#" class="create-actions__button-add-video">
			@svg('smVideo')
		</a>
		@if (isset($chart))
			<a href="#" class="create-actions__button-add-chart">
				@svg('chart')
			</a>
		@endif
		<a href="#" class="create-actions__button-add-text">
			@svg('pen')
		</a>
	</div>
</div>
