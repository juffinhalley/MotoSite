@extends('layouts.main')

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content">
				<aside class="page-aside-block">
					@include('block.sideMenu')

					@include('block.asideMap')
				</aside>

				<div class="page-content page-content--double">
					<div class="page-content__center">
						<form class="js-form" action="" method="post" data-ajax="./hidden/response/demo.json">
							<div class="form-item form-item--type2 form-item--decor">
								<span class="form-item__decor">
									@svg('search')
								</span>

								<input value="" required placeholder="Поиск" type="text" id="search" name="search" class="form-input form-input--lg">
							</div>
						</form>

						<div class="grid grid--1">
							<div class="gcell">
								<a href='#' class="chat-history is-new">
									<div class="chat-history__image">
										<img src="{{ URL::asset('images/profile_50x50.jpg') }}" alt="">
									</div>
		
									<div class="chat-history__content">
										<div class="grid _mb-sm _pt-sm">
												<div class="gcell gcell--auto _pr-sm">
													<span class="title title--dark title--sm">Руслан Малиновский</span>
												</div>
		
												<div class="gcell gcell--4 _ml-auto _flex _items-center _justify-end">
													<span class="icon icon--sm icon--grey _ml-ms _mr-ms">
														@svg('mail')
													</span>
		
													<span class="text text--sm text--grey">
														11 минут назад
													</span>
												</div>
										</div>
		
										<div class="chat-history__message _flex">
												<span class="text text--ms text--grey _lh100">Нужно обговорить это более детально, как буду на месте..Нужно обговорить это более детально, как буду на месте..Нужно обговорить это более детально, как буду на месте..										</span>
										</div>
									</div>
								</a>
							</div>

							<div class="gcell">
								<a href='#' class="chat-history is-new">
									<div class="chat-history__image">
										<img src="{{ URL::asset('images/profile_50x50.jpg') }}" alt="">
									</div>
		
									<div class="chat-history__content">
										<div class="grid _mb-sm _pt-sm">
											<div class="gcell gcell--auto _pr-sm">
												<span class="title title--dark title--sm">Руслан Малиновский</span>
											</div>
		
											<div class="gcell gcell--4 _ml-auto _flex _items-center _justify-end">
												<span class="icon icon--sm icon--grey _ml-ms _mr-ms">
													@svg('announs')
												</span>
		
												<span class="text text--sm text--grey">
													11 минут назад
												</span>
											</div>
										</div>
		
										<div class="chat-history__message _flex">
											<span class="text text--ms text--grey _lh100">Нужно обговорить это более детально, как буду на месте..Нужно обговорить это более детально, как буду на месте..Нужно обговорить это более детально, как буду на месте..										</span>
										</div>
									</div>
								</a>
							</div>

							@for ($i = 0; $i < 15; $i++)
							<div class="gcell">
								<a href='#' class="chat-history">
									<div class="chat-history__image">
										<img src="{{ URL::asset('images/profile_50x50.jpg') }}" alt="">
									</div>
		
									<div class="chat-history__content">
										<div class="grid _mb-sm _pt-sm">
											<div class="gcell gcell--auto _pr-sm">
												<span class="title title--dark title--sm">Руслан Малиновский</span>
											</div>
		
											<div class="gcell gcell--4 _ml-auto _flex _items-center _justify-end">
												<span class="icon icon--sm icon--grey _ml-ms _mr-ms">
													@svg('mail')
												</span>
		
												<span class="text text--sm text--grey">
													11 минут назад
												</span>
											</div>
										</div>
		
										<div class="chat-history__message _flex">
											<span class="text text--ms text--grey _lh100">Нужно обговорить это более детально, как буду на месте..Нужно обговорить это более детально, как буду на месте..Нужно обговорить это более детально, как буду на месте..										</span>
										</div>
									</div>
								</a>
							</div>
							@endfor
						</div>
					</div>

					<div class="page-content__aside">
						<div class="aside-title">
							<span class="title title--ms title--normal">
								Сообщения
							</span>
						</div>

						<div class="aside-nav">
							<div class="aside-nav__item">
								<a href="/" class="text text--grey text--def _tdn">Личные <sup class="text text--red text--ms">+4</sup></a>
							</div>

							<div class="aside-nav__item">
								<a href="/" class="text text--grey text--def _tdn">По обьявлениям <sup class="text text--red text--ms">+4</sup></a>
							</div>

							<div class="aside-nav__item">
								<a href="/" class="text text--grey text--def _tdn">Помощник по выбору <sup class="text text--red text--ms">+4</sup></a>
							</div>
						</div>

						<hr class="_spacer10">

						<div class="notyfications">
							<div class="aside-title">
								<span class="title title--ms title--normal">
									Оповещения
								</span>
							</div>

							<hr class="_spacer10">
							
							<div class="notyfications__content">
								@for ($i = 0; $i < 5; $i++)
								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('cake')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">сегодня празднует свой день рождения!</span>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('camera')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">обновила фотографию</span>

									<a href='#' class="text text--sm text--black _tdn">на странице</a>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('mail')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">ответил на ваше</span>

									<a href='#' class="text text--sm text--black _tdn">объявление</a>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('camera')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">загрузил 3 новые</span>

									<a href='#' class="text text--sm text--black _tdn">фотографии</a>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('comment')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">и еще</span>

									<a href='#' class="text text--sm text--black _tdn">12 человек</a>

									<span class="text text--sm text--grey">прокоментировали вашу </span>

									<a href='#' class="text text--sm text--black _tdn">фотографию.</a>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('callendar')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">приглашает вас посетить</span>

									<a href='#' class="text text--sm text--black _tdn">событие.</a>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('feeds')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">опубликовал новую</span>

									<a href='#' class="text text--sm text--black _tdn">статью.</a>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('plus')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">и еще</span>

									<a href='#' class="text text--sm text--black _tdn">7 человек</a>

									<span class="text text--sm text--grey">повысили вашу репутацию.</span>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('heart')
									</span>

									<a href='#' class="text text--sm text--black _tdn">Александр Зинченко</a>

									<span class="text text--sm text--grey">и еще</span>

									<a href='#' class="text text--sm text--black _tdn">5 человек</a>

									<span class="text text--sm text--grey">считают вашу</span>

									<a href='#' class="text text--sm text--black _tdn">фотографию</a>

									<span class="text text--sm text--grey">классной.</span>
								</div>

								<div class="notyfications__item _mb-sm">
									<span class="icon icon--sm icon--grey _ml-sm _mr-sm">
										@svg('battle')
									</span>

									<span class="text text--sm text--grey">Ваш</span>
									
									<a href='#' class="text text--sm text--black _tdn">мотоцикл</a>

									<span class="text text--sm text--grey">выиграл батл.</span>
								</div>
								@endfor
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection