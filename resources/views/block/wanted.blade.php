<div class="settups-form">
	<form class="settups-form__form">
		<div class="grid grid--hspace-xl _mgb12">
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
					<span class="regular-text regular-text--t1">Всего в угоне 14 мотоциклов</span>
				</div>
			</div>

			<div class="gcell gcell--md-3 _df">
				<div class="button paper-button paper-button--hover button--white button--sm _mgla" data-ripple-color="#b7b7b7">
					<div class="button__content">
				    	<span class="button__text">Добавить</span>
				   	</div>
				</div>
			</div>
		</div>

		<div class="grid grid--hspace-xl">
			<div class="gcell gcell--md-3">
				<div class="select-wrapper select-wrapper--md select-wrapper--w100 select-wrapper--grey">
					<select class="js-choice-select">
						<option value="2" placeholder>год выпуска</option>
						<option value="1">2010</option>
						<option value="1">2011</option>
						<option value="1">2012</option>
						<option value="1">2013</option>
						<option value="1">2014</option>
						<option value="1">2015</option>
						<option value="1">2016</option>
						<option value="1">2017</option>
						<option value="1">2018</option>
					</select>
				</div>
			</div>
			<div class="gcell gcell--md-3">
				<div class="select-wrapper select-wrapper--md select-wrapper--w100 select-wrapper--grey">
					<select class="js-choice-select">
						<option value="2" selected>От</option>
						<option value="1">До</option>
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
						<option value="2" placeholder>Модель</option>
						<option value="1">Модель1</option>
						<option value="1">Модель2</option>
						<option value="1">Модель3</option>
						<option value="1">Модель4</option>
						<option value="1">Модель5</option>
					</select>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="wanted-items js-show-more-block" data-show-more-id="1">
	@for ($e = 0; $e < 10; $e++)
	<div class="wanted-item" data-wanted-item='123'>
		<div class="wanted-item__wrapper">
			<div class="wanted-item__image-wrapper">
				<div class="wanted-item__label">
					В угоне
				</div>

				<div class="slider slider--item" data-slider="itemSlider" data-left-arrow="@svg('arrowLeft')" data-right-arrow="@svg('arrowRight')">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@for ($i = 0; $i < 5; $i++)
							<div class="swiper-slide">
								<div class="wanted-item__image">
									<img src="{{ URL::asset('images/wanted_315x214.jpg') }}" alt="" title="">
								</div>
							</div>
							@endfor
						</div>
					</div>

					<div class="slider-arrow slider-arrow--left" data-arrow="left"></div>
					<div class="slider-arrow slider-arrow--right" data-arrow="right"></div>
				</div>
			</div>

			<div class="wanted-item__descr">
				<div class="wanted-item__title-row">
					<div class="wanted-item__name">
						YAMAHA YZF-R3A 2016
					</div>

					<div class="wanted-item__city">
						@svg('marker')

						<span>
							Херсон,UA
						</span>
					</div>
				</div>

				<div class="wanted-item__info">
					<div class="grid _mgb6">
						<div class="gcell gcell--6 gcell--sm-4">
							<div class="wanted-item__info-item">Дата угона: 12.07.17</div>
						</div>

						<div class="gcell gcell--6 gcell--sm-8">
							<div class="wanted-item__info-item">Номер двигателя: ABS1CR7H3400****</div>
						</div>
					</div>

					<div class="grid">
						<div class="gcell gcell--6 gcell--sm-4">
							<div class="wanted-item__info-item">Пробег: 20 тыс. км.</div>
						</div>

						<div class="gcell gcell--6 gcell--sm-3">
							<div class="wanted-item__info-item">Цвет: Синий</div>
						</div>

						<div class="gcell gcell--12 gcell--sm-5">
							<div class="wanted-item__info-item">Номер рамы: NYUCJ1514000****</div>
						</div>
					</div>
				</div>

				<div class="wanted-item__descr-title">
					Описание угона
				</div>

				<div class="wanted-item__descr-text">
					Задача организации, в особенности же постоянное информационно-техническое обеспечение нашей деятельности представляет собой интересный эксперимент проверки направлений прогрессивного развития. Дорогие друзья, новая модель организационной деятельности требует от нас анализа всесторонне сбалансированных нововведений. 
					Соображения высшего порядка, а также курс на социально-ориентированный национальный проект влечет за собой процесс внедрения и модернизации системы обучения кадров.
				</div>	
			</div>
		</div>

		<div class="wanted-item__user">
			<div class="wanted-item__user-row">
				<div class="wanted-item__user-title">Информация о владельце</div>
			</div>

			<div class="wanted-item__user-row">
				<div class="wanted-item__user-image">
					<img src="{{ URL::asset('images/profile_70x70.jpg') }}">
				</div>

				<div class="wanted-item__user-descr">
					<div class="wanted-item__user-descr-row _mgba">
						<div class="wanted-item__user-name">
							Михаил Булгаков
						</div>
					</div>

					<div class="wanted-item__user-descr-row _df">
						@if ($e == 0)
							<button class="button paper-button paper-button--hover button--default button--mds button--icon-left" data-ripple-color="#b7b7b7">
		                   		<div class="button__content">
			                       @svg("pen")

			                       <span class="button__text">Изменить</span>
			                   </div>
		                   	</button>

		                   	<button class="button paper-button paper-button--hover button--default button--mds button--icon-left" data-wanted-remove data-ripple-color="#b7b7b7">
		                   		<div class="button__content">
			                       @svg("cross")

			                       <span class="button__text">Удалить</span>
			                   </div>
		                   	</button>
						@else
							<div class="button paper-button paper-button--hover button--default button--mds" data-ripple-color="#b7b7b7">
								<div class="button__content">
							    	<span class="button__text">Написать</span>
							   	</div>
							</div>
						@endif

						<div class="button paper-button paper-button--hover button--default button--mdlg _mgla" data-ripple-color="#b7b7b7">
							<div class="button__content">
						    	<span class="button__text">Посетить страницу мотоцикла</span>
						   	</div>
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
    		<span class="button__text">Показать еще 10</span>

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