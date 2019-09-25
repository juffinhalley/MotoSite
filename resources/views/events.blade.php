

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
					<div class="inner-event__tabs inner-event__tabs--omg">
						<div class="inner-event__tabs-row">
							<a href='#' class="inner-event__tab-button paper-button is-active" data-ripple-color="#b7b7b7">
								<div class="inner-event__tab-button-i">Актуальные события</div>
							</a>

							<a href='#' class="inner-event__tab-button paper-button" data-ripple-color="#b7b7b7">
								<div class="inner-event__tab-button-i">Прошедшие события</div>
							</a>

							<a href='#' class="inner-event__tab-button paper-button" data-ripple-color="#b7b7b7">
								<div class="inner-event__tab-button-i">Ожидающие подтверждения</div>
							</a>
						</div>

						<div class="inner-event__tabs-content">
							<div class="inner-event__tab">
								<div class="settups-form settups-form--grey2">
									<form class="settups-form__form">
										<div class="grid grid--hspace-xl">
											<div class="gcell gcell--md-3">
												<div class="select-wrapper select-wrapper--md select-wrapper--w100 select-wrapper--grey">
													<select class="js-choice-select">
														<option value="1" selected>По дате</option>
														<option value="2">По недате</option>
														<option value="3">По еще чемуто</option>
													</select>
												</div>
											</div>

											<div class="gcell gcell--md-6">
												<div class="settups-form__text">
													<span class="regular-text regular-text--grey regular-text--t1">Ожидаються 15 событий</span>
												</div>
											</div>

											<div class="gcell gcell--md-3 _df">
												<a href='/' class="button paper-button paper-button--hover button--white button--md _mgla" data-ripple-color="#b7b7b7">
													<div class="button__content">
														<span class="button__text">Добавить</span>
													</div>
												</a>
											</div>
										</div>
									</form>
								</div>

								<div class="events-list-grid">
									@for ($i = 0; $i < 4; $i++)
										<div class="events-list-item">
											<div class="events-list-item__image-row">
												<div class="events-list-item__image">
													<img src="{{ URL::asset('images/image_300x200.jpg') }}" alt="" title="">
												</div>

												<div class="events-list-item__time">
													До начала 03:21:32
												</div>

												<div class="events-list-item__image-irow">
													<div class="events-list-item__loc">
														@svg("marker")

														Одесса,UA
													</div>

													<div class="events-list-item__members">
														Участников: 947
													</div>
												</div>
											</div>

											<div class="events-list-item__descr">
												<div class="events-list-item__name">
													Мотопробег из Херсона в Прагу
												</div>

												<div class="events-list-item__text">
													Дорогие друзья, собираемся отправится в недельное путишествие проедем через 12 городов, море впечатлений и горы фана гарантировано. Ждем как опытных так и начинающих мотолюбителей. Стартуем в городе Херсон.
												</div>

												<div class="events-list-item__row">
													<div class="events-list-item__user">
														<div class="events-list-item__user-row">
															<div class="events-list-item__user-image">
																<img src="{{ URL::asset('images/profile_60x60.jpg') }}" alt="" title="">
															</div>

															<div class="events-list-item__idescr">
																<div class="events-list-item__org">
																	Организатор
																</div>

																<div class="events-list-item__org-name">
																	Александр Дюма
																</div>

																<div class="events-list-item__wdate">
																	с нами с 11.05.17
																</div>
															</div>
														</div>

														<div class="events-list-item__user-bottom">
															<div class="events-list-item__rep">
																<span>Репутация:</span> 254
															</div>

															<div class="events-list-item__loc">
																@svg("marker")

																Одесса,UA
															</div>
														</div>
													</div>

													<div class="events-list-item__more">
														<div class="events-list-item__more-date">
															Дата события: 16.07.17
														</div>

														<div class="events-list-item__button">
															<a href='/' class="button paper-button paper-button--hover button--whiteborder button--md" data-ripple-color="#b7b7b7">
																<div class="button__content">
																	<span class="button__text">Подробней</span>
																</div>
															</a>
														</div>

														<div class="events-list-item__more-widget">
															<div class="widget-button-block">
																@svg('eye')

																<span>231</span>
															</div>

															<div class="widget-button-block">
																@svg('heart')

																<span>6341</span>
															</div>

															<div class="widget-button-block">
																@svg('comment')

																<span>99</span>
															</div>
														</div>		
													</div>
												</div>
											</div>
										</div>
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
			</div>
		</div>
	</div>
@endsection