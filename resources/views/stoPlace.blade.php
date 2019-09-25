<?php
	$stoPlace = [
		[
			'title' => 'СТО Motoservice',
			'feedback' => '',
			'creator' => 'place',
			'buttons' => '',
			'personName' => 'СТО Motorservice'
		]
	];
	$arrInfo = [
		[
			'infoType' => 'Рейтинг:',
			'infoRate' => '5',
			'infoValue' => '(35 отзывов)'
		],
		[
			'infoType' => 'Веб-сайт:',
			'infoValue' => 'motoservice.ks.ua'
		],
		[
			'infoType' => 'Время работы:',
			'infoValue' => '9-19, пн-сб'
		]
	]
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
				<div class="container container--no-gap _mb-def">

					@include('block.breadcrumbs', ['cls' => '_mb-ms'], ['clsnomgl'=>'_nomgl'])

					<div class="grid _mb-md">
						<div class="gcell _ml-auto">
							@include('widget.confirmDisc')
						</div>
					</div>

					@include('block.placeTop', ['item' => $stoPlace[0]], ['arrInfo' => $arrInfo])

					@include('block.placeBottom', ['service' => ''])

				</div>
			</div>

		</div>
	</div>
</div>
@endsection
