

@extends('layouts.main')

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content">
				<aside class="page-aside-block">
					@include('block.sideMenu')

					@include('block.asideMap')

					@include('block.asideBanner')
				</aside>

				<div class="page-content">
					@include('block.announces')

					@include('block.descrSlider', [
						"miniBlock"=> [
							"text"=> "Фото дня",
							"buttonShow"=> true,
							"buttonMore"=> false,
							"subdir"=> "",
							"imgText"=> "",
							"image"=> "minidescr_image_255x184.jpg"
						],
						"sliderBlock"=> [
							"text"=> "Новые фотографии",
							"buttonMore"=> true,
							"slideText"=> "",
							"buttonShow"=> false,
							"slideSubdir"=> "",
							"image"=> "response_image_700x320.jpg",
							"respButton"=> true
						]
					])

					@include('block.descrSlider', [
						"miniBlock"=> [
							"text"=> "Мото дня",
							"buttonShow"=> true,
							"buttonMore"=> false,
							"subdir"=> "",
							"imgText"=> "Harley Davidson",
							"image"=> "minidescr_image2_255x184.jpg"
						],
						"sliderBlock"=> [
							"text"=> "Новые мотоциклы",
							"buttonMore"=> true,
							"slideText"=> "Выставка Мото 2017",
							"buttonShow"=> false,
							"slideSubdir"=> "",
							"image"=> "slider_image2_220x184.jpg",
							"respButton"=> true
						]
					])

					@include('block.descrSlider', [
						"miniBlock"=> [
							"text"=> "Ближайшее событие",
							"buttonShow"=> false,
							"buttonMore"=> true,
							"subdir"=> "До начала 03:27:32",
							"imgText"=> "Мотопробег из Херсона в Прагу",
							"image"=> "minidescr_image3_255x184.jpg"
						],
						"sliderBlock"=> [
							"text"=> "Ожидаемые события",
							"buttonMore"=> false,
							"slideText"=> "Выставка Мото 2017",
							"buttonShow"=> true,
							"slideSubdir"=> "До начала 15:14:03",
							"image"=> "slider_image3_220x184.jpg",
							"respButton"=> false
						]
					])
				</div>
			</div>
		</div>
	</div>

	<div class="section _grey-bg">
		<div class="container">
			<div class="page-content-wrapper__content">
				<aside class="page-aside-block">
				</aside>

				<div class="page-content">
					@include('block.clubs')
				</div>
			</div>
		</div>
	</div>
@endsection