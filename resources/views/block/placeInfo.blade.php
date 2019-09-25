<?php
 	$sliderService = [
		[
			'typeSlider' => 'mySliderOnePag',
			'styleSlider' => 'my-slider--one-pag',
			'typeSlideItems' => 'default',
			'defaultURL' => 'sto_place_slide_825x450.jpg'
		]
	];
	$sliderSchool = [
		[
			'typeSlider' => 'mySliderOnePag',
			'styleSlider' => 'my-slider--one-pag',
			'typeSlideItems' => 'default',
			'defaultURL' => 'school_place_slide_825x450.jpg'
		]
	];
	$sliderHelp = [
		[
			'typeSlider' => 'mySliderOnePag',
			'styleSlider' => 'my-slider--one-pag',
			'typeSlideItems' => 'default',
			'defaultURL' => 'help_place_slide_825x450.jpg'
		]
	];
	$sliderShop = [
		[
			'typeSlider' => 'mySliderOnePag',
			'styleSlider' => 'my-slider--one-pag',
			'typeSlideItems' => 'default',
			'defaultURL' => 'shop_place_slide_825x450.jpg'
		]
	];
	$sliderRest = [
		[
			'typeSlider' => 'mySliderOnePag',
			'styleSlider' => 'my-slider--one-pag',
			'typeSlideItems' => 'default',
			'defaultURL' => 'rest_place_slide_825x450.jpg'
		]
	];
	$sliderInterest = [
		[
			'typeSlider' => 'mySliderOnePag',
			'styleSlider' => 'my-slider--one-pag',
			'typeSlideItems' => 'default',
			'defaultURL' => 'interest_place_slide_825x450.jpg'
		]
	];
	$sliderGathering = [
		[
			'typeSlider' => 'mySliderOnePag',
			'styleSlider' => 'my-slider--one-pag',
			'typeSlideItems' => 'default',
			'defaultURL' => 'gathering_place_slide_825x450.jpg'
		]
	]
?>
<div class="place-info">
	<div class="place-info__text">
		Проект позволяет выполнить важнейшие задания по разработке модели развития? Равным образом консультация с профессионалами из IT способствует подготовке и реализации соответствующих условий активизации.
		С другой стороны выбранный нами инновационный путь играет важную роль в формировании экономической целесообразности принимаемых решений. Соображения высшего порядка, а также выбранный нами инновационный путь способствует повышению актуальности ключевых компонентов планируемого обновления? Повседневная практика показывает, что рамки и место обучения кадров позволяет выполнить важнейшие задания по разработке соответствующих условий активизации.Соображения высшего порядка, а также выбранный нами инновационный путь способствует повышению актуальности ключевых компонентов планируемого обновления?
	</div>
	<div class="place-info__slider">
		@if (isset($placeInfo['service']))
			@foreach ($sliderService as $item)
				@include('block.mySlider', $item)
			@endforeach
		@elseif (isset($placeInfo['school']))
			@foreach ($sliderSchool as $item)
				@include('block.mySlider', $item)
			@endforeach
		@elseif (isset($placeInfo['help']))
			@foreach ($sliderHelp as $item)
				@include('block.mySlider', $item)
			@endforeach
		@elseif (isset($placeInfo['shop']))
			@foreach ($sliderShop as $item)
				@include('block.mySlider', $item)
			@endforeach
		@elseif (isset($placeInfo['rest']))
			@foreach ($sliderRest as $item)
				@include('block.mySlider', $item)
			@endforeach
		@elseif (isset($placeInfo['interest']))
			@foreach ($sliderInterest as $item)
				@include('block.mySlider', $item)
			@endforeach
		@elseif (isset($placeInfo['gathering']))
			@foreach ($sliderGathering as $item)
				@include('block.mySlider', $item)
			@endforeach
		@endif

	</div>
</div>
