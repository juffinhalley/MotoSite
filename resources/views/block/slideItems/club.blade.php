@if (isset($type))

@if ($type == 'topSlider')
<a href='#' class="motoclub-item-block motoclub-item-block--topslider">
	<div class="motoclub-item-block__wrapper">
		<div class="motoclub-item-block__image">
			<img src="{{ URL::asset('images/club_255x160.jpg') }}" alt="" title="">
		</div>

		<div class="motoclub-item-block__label">

			<span>
				@svg("star")
				топ 1
			</span>
		</div>

		<div class="motoclub-item-block__descr">
			<div class="motoclub-item-block__name">
				MG «Warriors»
			</div>
			<div class="motoclub-item-block__button">
				<span class="motoclub-item-block__hover-arrow"></span>
			</div>

			<div class="motoclub-item-block__loc">
				<span>
					Одесса,UA
				</span>
			</div>
		</div>
	</div>
</a>
@endif

@else
<a href='#' class="motoclub-item-block">
	<div class="motoclub-item-block__image">
		<img src="{{ URL::asset('images/club_220x170.jpg') }}" alt="" title="">
	</div>

	<div class="motoclub-item-block__label">
		@svg("star")

		<span>
			топ 1
		</span>
	</div>

	<div class="motoclub-item-block__descr">
		<div class="motoclub-item-block__name">
			MG «Warriors»
		</div>

		<div class="motoclub-item-block__loc">
			@svg("marker")

			<span>
				Одесса,UA
			</span>
		</div>
	</div>
</a>
@endif
