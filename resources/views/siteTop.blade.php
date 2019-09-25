<?php
	$bestMaterialsItem = [
		[
			"title" => "Фото недели",
			"type" => "photo"
		],
		[
			"title" => "Видео недели",
			"type" => "video"
		],
		[
			"title" => "Пользователь недели",
			"type" => "user"
		],
		[
			"title" => "Мотоцикл недели",
			"type" => "moto"
		],
		[
			"title" => "Событие недели",
			"type" => "event"
		],
		[
			"title" => "Статья недели",
			"type" => "article"
		]
	];
?>
@extends('layouts.main')

@section('content')
<div class="section">
	<div class="container">
		<div class="page-content-wrapper__content">
			<aside class="page-aside-block">

				@include('block.sideMenu')

				@include('block.asideMap')

			</aside>

			<div class="page-content">
				<div class="grid _md-pr-def">

					<div class="gcell gcell--12 _flex _justify-center _mb-mg">
						<span class="title title--dark title--light title--md _text-center">
							Мы внимательно изучили все материалы на сайте и составили рейтинг всего, на что стоит обратить внимание
						</span>
					</div>

					<div class="gcell gcell--12 _mb-xl">
						<div class="grid _ptb-ms _flex _flex-column _sm-flex-row _items-center _gborder-top _gborder-bottom _justify-between">
							<div class="gcell _mb-md _sm-mb-none">
								<span class="title title--grey2 title--ms title--light">
									Лучшие материалы
								</span>
							</div>
							<div class="gcell">
								<div class="form-item">
									<div class="select-wrapper select-wrapper--lgm select-wrapper--lGrey">
										<select class="js-choice-select" data-select-search="false">
											<option value="0">За неделю</option>
											<option value="1">За месяц</option>
											<option value="2">За год</option>
											<option value="3">За всё время</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="grid grid--1 grid--sm-2 grid--md-3 grid--sm-hspace-md grid--md-hspace--xl grid--vspace-xl _md-pr-def">
					@foreach ($bestMaterialsItem as $item)
					<div class="gcell">
						@include('block.bestMaterialsItem')
					</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>

<div class="section section--mt _grey-bg">
	<div class="decore-bg decore-bg__hidden is-active">
		<img src="{{ URL::asset('images/decore_top_moto_1440x164.png') }}">
	</div>
	<div class="container">
		<div class="page-content-wrapper__content">
			<aside class="page-aside-block">
			</aside>

			<div class="page-content">
				@include('block.motoSiteTopSlider')
			</div>
		</div>
	</div>

</div>

@endsection
