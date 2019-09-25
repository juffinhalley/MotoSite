@extends('layouts.main')

@php
	$items = [
		[

			"title" => "Порекомендуйте",
			"text" => "Самый простой, но самый эффективный способ поддержать - это рассказать своим друзьям о нас, порекомендовать нас в социальных сетях.",
			"image" => "images/support_image1.png"
		],
		[

			"title" => "Выскажитесь",
			"text" => "Поделитесь своими мнениями и знаниями, оставляя комментарии на страницах статей, фотографий, мотоциклов, ведите бортжурнал своего мотоцикла.",
			"image" => "images/support_image2.png"
		],
		[

			"title" => "Профинансируйте",
			"text" => "Проект существует на наши собственные средства. Даже небольшая сумма поможет ускорить развитие сайта и сделать его более качественным.",
			"image" => "images/support_image3.png"
		]
	];
@endphp

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content">
				<div class="page-content">
					<section class="widget">
						<div class="support">
							<div class="page-title">
								Как вы можете нас поддержать
							</div>

							<div class="support__items">
								@foreach ($items as $element)
								<div class="support-item">
									<div class="support-item__content">
										<div class="support-item__image">
											<img src="{{ URL::asset($element['image']) }}" alt="" title="">
										</div>

										<div class="support-item__title">
											{{ $element['title'] }}
										</div>

										<div class="support-item__text">
											{{ $element['text'] }}
										</div>
									</div>
								</div>
								@endforeach
							</div>

							<div class="support__pay _mgb40">
								<div class="support__pay-title">
									Свою финансовую поддержку вы можете оказать электронным переводом через следующие платежные системы:
								</div>

								<div class="support__pay-items">
									<div class="support-pay-item">
										<img src="{{ URL::asset('images/wm_logo.png') }}" alt="" title="">
									</div>
									<div class="support-pay-item">
										<img src="{{ URL::asset('images/qiwi_logo.png') }}" alt="" title="">
									</div>
									<div class="support-pay-item">
										<img src="{{ URL::asset('images/payPal_logo.png') }}" alt="" title="">
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
@endsection

