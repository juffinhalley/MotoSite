

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
					@include('block.breadcrumbs')

					<hr class="_spacer30">

					<div class="section section--content section--aaa _mgb20">
						<div class="grid grid--def-4 grid--2">
							<div class="gcell">
								<a href='#' class="aaanavitem">
									<div class="aaanavitem__image">
										<img src="{{ URL::asset('/images/advimage1.png') }}" alt="">
									</div>

									<div class="aaanavitem__text">
										Экипировка
									</div>
								</a>
							</div>

							<div class="gcell">
								<a href='#' class="aaanavitem is-active">
									<div class="aaanavitem__image">
										<img src="{{ URL::asset('/images/advimage2.png') }}" alt="">
									</div>

									<div class="aaanavitem__text">
										Мотоциклы
									</div>
								</a>
							</div>

							<div class="gcell">
								<a href='#' class="aaanavitem">
									<div class="aaanavitem__image">
										<img src="{{ URL::asset('/images/advimage3.png') }}" alt="">
									</div>

									<div class="aaanavitem__text">
										Запчасти
									</div>
								</a>
							</div>

							<div class="gcell">
								<a href='#' class="aaanavitem">
									<div class="aaanavitem__image">
										<img src="{{ URL::asset('/images/advimage4.png') }}" alt="">
									</div>

									<div class="aaanavitem__text">
										Другое
									</div>
								</a>
							</div>
						</div>
					</div>

					<div class="section section--content">
						<div class="grid grid--1">
							<div class="gcell">
								@for ($i = 0; $i < 3; $i++)
									<div class="aaaitem">
										<a href='#' class="aaaitem__image">
											<img src="{{ URL::asset('/images/announces_image_315x214.jpg') }}" alt="">
										</a>

										<div class="aaaitem__descr">
											<div class="aaaitem__name">
												<a href="#">Двигатель Honda CBR250R MC19 MC14E</a>
											</div>
											
											<div class="aaaitem__infos">
												<div class="grid">
													<div class="gcell gcell--auto">
														<div class="aaaitem__info-item">
															Цена: <span>1500$</span>
														</div>
													</div>

													<div class="gcell gcell--auto">
														<div class="aaaitem__info-item">
															Обьем: <span>250 куб. см</span>
														</div>
													</div>

													<div class="gcell gcell--auto">
														<div class="aaaitem__info-item">
															Макс. крутящий момент	: <span>23,8 Нм</span>
														</div>
													</div>
												</div>
											</div>

											<div class="aaaitem__text">
												С другой стороны реализация намеченного плана развития в значительной степени обуславливает создание модели развития. 
												Дорогие друзья, начало повседневной работы по формированию позиции требует определения и уточнения форм воздействия. ЗС другой стороны сложившаяся структура организации способствует подготовке и реализации системы обучения кадров, соответствующей насущным потребностям...
											</div>

											<div class="aaaitem__button">
												<a href="#" class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
													<div class="button__content">
														<span class="button__text">Подробнее</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								@endfor
							</div>
						</div>
					</div>

					<div class="show-more-button-wrapper">
						<button class="button paper-button paper-button--hover button--default button--mds js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7">
							<div class="button__content">
								<span class="button__text">Показать еще 9</span>

								<span class="button__icon">
								@svg("arrowBottom")
								</span>
							</div>
						</button>
					</div>

					<div class="pagination-wrapper">
						<div class="pagination js-show-more-pagination" data-show-more-id="1">
							<a href='#' class="pagination-button is-active" data-pagination-index='1'>
								<span>1</span>
							</a>

							<a href='#' class="pagination-button" data-pagination-index='2'>
								<span>2</span>
							</a>

							<a href='#' class="pagination-button" data-pagination-index='3'>
								<span>3</span>
							</a>

							<a href='#' class="pagination-button pagination-button--more">
								<span>...</span>
							</a>

							<a href='#' class="pagination-button" data-pagination-index='98'>
								<span>98</span>
							</a>
						</div>
					</div>

					<hr class="_spacer30">
				</div>
			</div>
		</div>
	</div>
@endsection