<?php
	$menuData = [
		[
			"icon"=> "star",
			"text"=> "Топ",
			"url" => "/"
		],
		[
			"icon"=> "battle",
			"text"=> "Батлы",
			"url" => "battles"
		],
		[
			"icon"=> "announs",
			"text"=> "Обьявления",
			"url" => "/"
		],
		[
			"icon"=> "callendar",
			"text"=> "События",
			"url" => "events"
		],
		[
			"icon"=> "users",
			"text"=> "Мотоклубы",
			"url" => "clubs"
		],
		[
			"icon"=> "",
			"text"=> "Люди",
			"url" => "/"
		],
		[
			"icon"=> "camera",
			"text"=> "Фотографии",
			"url" => "/"
		],
		[
			"icon"=> "video",
			"text"=> "Видеозаписи",
			"url" => "/"
		],
		[
			"icon"=> "feeds",
			"text"=> "Статьи",
			"url" => "/"
		],
		[
			"icon"=> "helmet",
			"text"=> "Мотоциклы",
			"url" => "motos"
		]
	];
?>

<section class="widget">
	<div class="main-menu-block">
		<div class="main-menu-block__close">
			<div id='js-close-burger-menu-button' class="burger-block burger-block--nobd is-active">
				<div class="burger-block__content">
					<span class="burger-block__decor"></span>
					<span class="burger-block__decor"></span>
					<span class="burger-block__decor"></span>
				</div>
			</div>
		</div>

		<div class="main-menu-block__resp-logo">
			<a href='#' class="logo-block svg-wrapper">
				@include('widget.svg', ['name' => 'motosite_logo'])
			</a>
		</div>

		<div class="main-menu-block__list">
			@foreach ($menuData as $item)
			<div class="main-menu-block__list-item">
				<a href="{{ $item['url'] }}" class="main-menu-block__list-link">
					<span class="main-menu-block__list-icon">
						@include('widget.svg', ['name' => $item['icon']])
					</span>
					
					<span class="main-menu-block__list-text">{{ $item['text'] }}</span>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</section>
