@php
	$typesFilter = [
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto1.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto2.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto3.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto4.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto5.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto6.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto7.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto8.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto9.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto10.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto11.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto12.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto13.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto14.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto15.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto16.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto17.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto18.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto19.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto20.png')
		],
		[
			"text" => "Все",
			"icon" => URL::asset('/images/moto21.png')
		],
	]
@endphp

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

					<form action="">
						<div class="filter-regular">
							<div class="grid _p-ms">
								<div class="gcell gcel--auto">
									<div class="battles-assets__form-row-inner-row">
										<span class="regular-text _mgr10 regular-text--t1">
											Сортировать по принципу:
										</span>
					
										<div class="select-wrapper select-wrapper--md select-wrapper--grey">
											<select class="js-choice-select">
												<option selected="selected" value="1">Сначала новые</option>
												<option value="3">Сначала новые</option>
												<option value="2">Сначала новые</option>
												<option value="4">Сначала новые</option>
											</select>
										</div>
									</div>
								</div>

								<div class="gcell gcel--auto _mgla">
									<div class="battles-assets__form-row-inner-row">
										<span class="regular-text _mgr10 regular-text--t1">
											Категория:
										</span>
						
										<div class="select-wrapper select-wrapper--md select-wrapper--grey">
											<select class="js-choice-select">
												<option selected="selected" value="1">Мотоциклы</option>
												<option value="3">Мотоциклы</option>
												<option value="2">Мотоциклы</option>
												<option value="4">Мотоциклы</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="filter-by-type-regular">
							<div class="grid grid--7">
								@foreach ($typesFilter as $item => $ii)
								<div class="gcell">
									<div class="type-filter-item {{ $item == 1 ? " is-active" : "" }}">
										<span class="type-filter-item__icon">
											<img src="{{ $ii['icon'] }}" alt="">
										</span>

										<span class="type-filter-item__text">
											{{ $ii['text'] }}
										</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>

						<div class="megafilter">
							<div class="grid grid--3 _p-md">
								<div class="gcell">
									<div class="battles-assets__form-row-inner-row">
										<span class="regular-text _mgr10 regular-text--t1">
											Марка:
										</span>
						
										{{-- <div class="select-wrapper select-wrapper--wsearch select-wrapper--md select-wrapper--grey">
											<select multiple class="js-choice-select" data-select-search="true" data-custom-choice="multiple">
												<option selected value="111">Марка</option>
												@for ($i = 0; $i < 55; $i++)
												<option value="{{ $i }}">Марка</option>
												@endfor
											</select>
										</div> --}}
									</div>
								</div>

								<div class="gcell">
									<div class="battles-assets__form-row-inner-row">
										<span class="regular-text _mgr10 regular-text--t1">
											Модель:
										</span>
							
										<div class="select-wrapper select-wrapper--md select-wrapper--grey">
											<select class="js-choice-select" data-select-search="true">
												<option selected="selected" value="1">Сначала новые</option>
												@for ($i = 0; $i < 55; $i++)
												<option value="{{ $i }}">Сначала новые</option>
												@endfor
											</select>
										</div>
									</div>
								</div>

								<div class="gcell">
									<div class="regular-text regular-text--grey regular-text--t3">Свернуть фильтр @svg("arrowBottom")</div>
								</div>
							</div>
						</div>

						<div class="megafilter2 _p-ms">
							<div class="grid grid--space-sm">
								@for ($i = 0; $i < 19; $i++)
								<div class="gcell gcel--auto">
									<a href="#" class="filter-thumb">
										<span>
											Мотоциклы
										</span>
		
										@svg("cross")
									</a>
								</div>
									
								<div class="gcell gcel--auto">
									<a href='#' class="filter-thumb">
										<span>
											после 2007
										</span>
		
										@svg("cross")
									</a>
								</div>
								@endfor
							</div>

							<div class="grid">
								<div class="gcell gcel--auto _df _aic">
									<span class="regular-text regular-text--grey regular-text--t3">
										Найдено 12 мотоциклов
									</span>
								</div>
								
								<div class="gcell gcel--auto _mgla">
									<a href="/" class="regular-text regular-text--grey regular-text--t3 _mgr18">
										Сбросить все фильтры
									</a>

									<button class="button paper-button paper-button--hover button--grey button--lgomg button--omgwhite" data-ripple-color="#b7b7b7">
										<div class="button__content">
											<span class="button__text">Поиск</span>
										</div>
									</button>
								</div>
							</div>
						</div>
					</form>

					<hr class="_spacer40">

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