@php
	$logotopimg=[
		[
			'image'=> URL::asset('images/logbook_top_img1_180x125.jpg'),
		],
		[
			'image'=> URL::asset('images/logbook_top_img2_180x125.jpg'),
		],
		[
			'image'=> URL::asset('images/logbook_top_img3_180x125.jpg'),
		],
		[
			'image'=> URL::asset('images/logbook_top_img4_180x125.jpg'),
		]
	];
@endphp


<section class="logbook-top-block">
@foreach ($logotopimg as $key)
	<a href="#" class="logbook-top-block__item">
		<div class="logbook-top-block__item-shadow"></div>
			<div class="logbook-top-block__image">
				<img src=" {{ $key['image'] }}" alt="" title="">
			</div>
			<div class="logbook-top-block__item-title">
				HONDA CRF1000L Africa Twin &laquo;Bullet&raquo;
			</div>
	</a>
@endforeach
</section>
