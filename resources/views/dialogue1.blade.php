

@extends('layouts.main')

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content">
				<aside class="page-aside-block">
					@include('block.sideMenu')

					@include('block.asideMap')

					@include('block.asideBanner')
				</aside>

				<div class="page-content">
					<div class="dialogue">
						<div id="chatbox1-app" class="dialogue__box" data-vue-app>
							<div class="grid _pr-md _pl-md _pt-sm _pb-sm _gborder-bottom">
								<div class="gcell gcell--2 _flex _items-center">
									<a href='/' class="icon icon--ms icon--grey">
										<svg>
											<use xlink:href="./svg/sprite.svg#arrowLeft"></use>
										</svg>
									</a>
								</div>

								<div class="gcell gcell--auto _ml-auto _mr-auto _flex _items-center">
									<a href='#' class="title title--dark title--ms title--light _tdn">
										Никита Шевченко
									</a>
								</div>

								<div class="gcell gcell--3 _flex _items-center _justify-end">
									<div class="modal-menu _mr-def">
										<span class="modal-menu__icon">
											<svg>
												<use xlink:href="./svg/sprite.svg#dots"></use>
											</svg>
										</span>
									</div>

									<span v-if="anotherUser" class="text text--def text--grey">
										online
									</span>

									<span v-else class="text text--def text--red">
										offline
									</span>
								</div>
							</div>

							<div class="dialogue__chat">
								<div class="chatbox" v-chat-scroll="{always: false, smooth: true}">
									<message v-for="item in chat" :key="item.index" :chat="item"></message>

									<div v-if="typing" class="chatbox__typing">
										Вам что-то пишут<span>.</span><span>.</span><span>.</span>
									</div>
								</div>
							</div>

							<div class="grid _pt-ms _pb-ms">
								<div class="gcell gcell--1"></div>
								
								<div class="gcell gcell--8">
									<input v-model="message" @keyup.enter="send" type="text" class="chatbox__input" placeholder="Напишите ваше сообщение здесь...">
								</div>

								<div class="gcell gcell--3"></div>
							</div>
						</div>

						<div class="dialogue__descr">
							<div class="grid grid--1">
								<div class="gcell _pr-md _pl-md _pt-sm _pb-sm _flex _items-center _justify-center _h42 _gborder-bottom">
									<a href='#' class="title title--dark title--sm title--light _tdn">
										Мотоцикл YAMAHA YZF-R3A
									</a>
								</div>

								<div class="gcell _gborder-bottom _flex">
									<a href="/" class="dialogue__moto-image">
										<img src="{{ URL::asset('images/image_100x100.jpg') }}" alt="">
									</a>

									<div class="dialogue__moto-params">
										<div class="text text--sm text--grey _mb-sm">Цена: 6500$</div>

										<div class="text text--sm text--grey _mb-sm">Пробег: 20000 км</div>

										<div class="text text--sm text--grey _mb-sm">Год выпуска: 2016</div>
									</div>
								</div>

								<div class="gcell _pl-ms _pr-ms _pt-def _pb-def _gborder-bottom">
									<span class="text text--def text--dark">
										Статус:
									</span>

									<span class="text text--def text--green">
										Активный
									</span>
								</div>

								<div class="gcell _pl-ms _pr-ms _pt-ms _pb-ms">
									<span class="text text--def text--dark">
										Стоимость:  
									</span>

									<span class="text text--def text--grey">
										20$
									</span>
								</div>

								<hr class="_spacer30">
								
								<div class="gcell _flex _justify-center">
									<a href='#' class="button paper-button paper-button--hover button--default button--18036" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">Закрыть сделку</span>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection