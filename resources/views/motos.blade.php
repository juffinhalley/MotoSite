

@extends('layouts.main')

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content _mgb120">
				<aside class="page-aside-block">
					@include('block.sideMenu')

					@include('block.asideMap')
				</aside>

				<div class="page-content">
					<section class="widget">
						<div class="slider-row-block slider-row-block--t2">
							<span class="regular-text regular-text--t2">
								Топ мотоциклы
							</span>

							<a href='#' class="button paper-button paper-button--hover button--default button--md _mgla" data-ripple-color="#b7b7b7">
								<div class="button__content">
									<span class="button__text">Смотреть все</span>
								</div>
							</a>
						</div>

						<div class="slider slider--triple _mgb55" data-slider="tripleMoto" data-left-arrow="@svg('arrowLeft')" data-right-arrow="@svg('arrowRight')">
							<div class="swiper-container">
								<div class="swiper-wrapper">
									@for ($i = 0; $i < 7; $i++)
									<div class="swiper-slide">
										<a href='#' class="motoclub-item-block motoclub-item-block--moto">
											<div class="motoclub-item-block__image">
												<img src="{{ URL::asset('images/moto_235x180.png') }}" alt="" title="">

												<div class="descr-widget">
													<div class="descr-widget__item">
														@svg("eye")

														<span>138745</span>
													</div>
													<div class="descr-widget__item">
														@svg("heart")

														<span>845849</span>
													</div>
													<div class="descr-widget__item">
														@svg("feeds")

														<span>41242</span>
													</div>
												</div>
											</div>

											<div class="motoclub-item-block__label">
												@svg("star")

												<span>
													топ 1
												</span>
											</div>

											<div class="achivments-widget">
												@svg("trophy")

												<span>57</span>
											</div>

											<div class="motoclub-item-block__descr">
												<div class="motoclub-item-block__name">
													BMW R nine T pure «Traveler»
												</div>
											</div>
										</a>
									</div>
									@endfor
								</div>
							</div>

							<div class="slider-arrow slider-arrow--left" data-arrow="left"></div>
							<div class="slider-arrow slider-arrow--right" data-arrow="right"></div>
						</div>
					</section>

					<section class="widget">
						<div class="settups-form settups-form--grey">
							<form class="settups-form__form">
								<div class="grid grid--hspace-xl _padb8">
									<div class="gcell gcell--md-3">
										<div class="select-wrapper select-wrapper--md select-wrapper--w100 select-wrapper--grey">
											<select class="js-choice-select">
												<option value="1" selected>По дате</option>
												<option value="2">По недате</option>
												<option value="3">По еще чемуто</option>
											</select>
										</div>
									</div>

									<div class="gcell gcell--md-3">
									</div>

									<div class="gcell gcell--md-3">
									</div>

									<div class="gcell gcell--md-3">
										<div class="settups-form__text">
											<span class="regular-text regular-text--grey regular-text--t1">1478 мотоциклов</span>
										</div>
									</div>
								</div>

								<div class="grid grid--hspace-xl _padtb15">
									<div class="gcell gcell--md-3">
										<div class="select-wrapper select-wrapper--md select-wrapper--w100 select-wrapper--grey">
											<select class="js-choice-select">
												<option value="2" placeholder>вид мотоцикла</option>
												<option value="1">вид мотоцикла1</option>
												<option value="1">вид мотоцикла2</option>
												<option value="1">вид мотоцикла3</option>
												<option value="1">вид мотоцикла4</option>
											</select>
										</div>
									</div>

									<div class="gcell gcell--md-3">
										<div class="select-wrapper select-wrapper--md select-wrapper--w100 select-wrapper--grey">
											<select class="js-choice-select">
												<option value="2" placeholder>Марка</option>
												<option value="1">Марка1</option>
												<option value="1">Марка2</option>
												<option value="1">Марка3</option>
												<option value="1">Марка4</option>
											</select>
										</div>
									</div>

									<div class="gcell gcell--md-3">
										<div class="select-wrapper select-wrapper--md select-wrapper--w100 select-wrapper--grey">
											<select class="js-choice-select">
												<option value="2" placeholder>модель</option>
												<option value="1">модель1</option>
												<option value="1">модель2</option>
												<option value="1">модель3</option>
												<option value="1">модель4</option>
											</select>
										</div>
									</div>

									<div class="gcell gcell--md-3">
									</div>
								</div>

								<div class="grid grid--hspace-xl">
									<div class="gcell gcell--md-6">
										<div class="settups-form__row">
											<span class="regular-text regular-text--t1 _mgr18">Год выпуска:</span>

											<div class="select-wrapper select-wrapper--sms select-wrapper--grey">
												<select class="js-choice-select">
													<option value="1" placeholder>С</option>
													<option value="2">312321</option>
													<option value="3">412412</option>
												</select>
											</div>

											<div class="settups-form__del regular-text regular-text--t1">
												-
											</div>

											<div class="select-wrapper select-wrapper--sms select-wrapper--grey">
												<select class="js-choice-select">
													<option value="1" placeholder>По</option>
													<option value="2">5125</option>
													<option value="3">6233</option>
												</select>
											</div>
										</div>
									</div>

									<div class="gcell gcell--md-6">
									</div>
								</div>
							</form>
						</div>
					</section>

					<div class="moto-items js-show-more-block" data-show-more-id="1">
						@for ($e = 0; $e < 9; $e++)
						<a href='#' class="moto-item">
							<div class="moto-item__image">
								<img src="{{ URL::asset('images/moto_260x180.jpg') }}">

								<div class="descr-widget">
									<div class="descr-widget__item">
										@svg("eye")

										<span>138745</span>
									</div>
									<div class="descr-widget__item">
										@svg("heart")

										<span>845849</span>
									</div>
									<div class="descr-widget__item">
										@svg("feeds")

										<span>41242</span>
									</div>
								</div>
							</div>

							<div class="moto-item__name">
								Honda CBR1000RA Fireblade «Fire»
							</div>
						</a>
						@endfor
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
				</div>
			</div>
		</div>
	</div>
@endsection