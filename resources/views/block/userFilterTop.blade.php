<?php
	$mySlider = [
		[
		"typeSlider" => "mySliderOneLim",
		"typeSlideItems" => "siteTopUser",
		"styleSlider" => 'my-slider--defaultLim my-slider--user-filter',
		"withoutButton" => ''
		]
	];
	$person = [
		[
			'buttonNone' => '',
			'cls' => 'person-item--user-filter',
			'userFilter' => ''
		]
	]
?>
<div class="user-filter-top">
	<div class="grid">
		<div class="gcell--12 gcell--psh-8">
			<div class="user-filter-top__left-col">
				<div class="user-filter-top__title">
					Топ пользователи
				</div>
				<div class="user-filter-top__slider">
					@foreach ($mySlider as $item)
						@include('block.mySlider')
					@endforeach
				</div>
			</div>
		</div>
		<div class="gcell--12 gcell--psh-4">
			<div class="user-filter-top__new-users">
				<div class="user-filter-top__new-users-title">
					Новые пользователи
				</div>
				<div class="user-filter-top__new-users-content">
					@for ($i=0; $i < 5; $i++)
						@include('block.person', ['itemPerson' => $person[0]])
					@endfor
				</div>
			</div>
		</div>
	</div>
</div>
