
<section class="widget">
	<div class="battles-block">
		<div class="battles-block__title">
			<span class="regular-text regular-text--t2">
				Батлы мотоциклов
			</span>	
		</div>

		<div class="battles-block__main">
			<div class="battles-block__battle-date">
				До конца батла 03:29:19
			</div>

			<div class="battles-block__battle-decor is-active">
				@svg("battle")
			</div>

			<div class="battles-block__item">
				<div class="battles-block__item-slider">
					<div class="slider slider--battles" data-slider="battles" data-left-arrow="@svg('arrowLeft')" data-right-arrow="@svg('arrowRight')">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								@for ($i = 0; $i < 3; $i++)
								<div class="swiper-slide">
									<div class="battles-block__slide">
										<div class="expand-image">
											@svg("expand")
										</div>

										<div class="disclaimer-image">
											@svg("disclaimer")
										</div>

										<div class="battles-block__slide-image">
											<img src="{{ URL::asset('images/battles_image2_426x276.jpg') }}" alt="" title="">
										</div>
									</div>
								</div>

								<div class="swiper-slide">
									<div class="battles-block__slide">
										<div class="expand-image">
											@svg("expand")
										</div>

										<div class="disclaimer-image">
											@svg("disclaimer")
										</div>

										<div class="battles-block__slide-image">
											<img src="{{ URL::asset('images/battles_image_426x276.jpg') }}" alt="" title="">
										</div>
									</div>
								</div>
								@endfor
							</div>
						</div>

						<div class="slider-arrow slider-arrow--left" data-arrow="left"></div>
						<div class="slider-arrow slider-arrow--right" data-arrow="right"></div>
					</div>
				</div>

				<div class="battles-block__item-descr">
					<a href='#' class="battles-block__item-name">Yamaha YZF R3A «Thunder»</a>

					<div class="battles-block__item-stat">
						+37
					</div>

					<div class="battles-block__item-battle">
						@svg("battle")
						<span>7</span>
					</div>
				</div>

				<div class="battles-block__item-assets">
					<div class="battles-block__item-like paper-button" data-ripple-color="#ededed">
						@svg("like")
					</div>

					<div class="battles-block__item-more paper-button" data-ripple-color="#ededed">
						<span>Описание мотоцикла</span>

						@svg("arrowBottom")
					</div>
				</div>
			</div>

			<div class="battles-block__item">
				<div class="battles-block__item-slider">
					<div class="slider slider--battles" data-slider="battles" data-left-arrow="@svg('arrowLeft')" data-right-arrow="@svg('arrowRight')">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								@for ($i = 0; $i < 3; $i++)
								<div class="swiper-slide">
									<div class="battles-block__slide">
										<div class="expand-image">
											@svg("expand")
										</div>

										<div class="disclaimer-image">
											@svg("disclaimer")
										</div>

										<div class="battles-block__slide-image">
											<img src="{{ URL::asset('images/battles_image_426x276.jpg') }}" alt="" title="">
										</div>
									</div>
								</div>

								<div class="swiper-slide">
									<div class="battles-block__slide">
										<div class="expand-image">
											@svg("expand")
										</div>

										<div class="disclaimer-image">
											@svg("disclaimer")
										</div>

										<div class="battles-block__slide-image">
											<img src="{{ URL::asset('images/battles_image2_426x276.jpg') }}" alt="" title="">
										</div>
									</div>
								</div>
								@endfor
							</div>
						</div>

						<div class="slider-arrow slider-arrow--left" data-arrow="left"></div>
						<div class="slider-arrow slider-arrow--right" data-arrow="right"></div>
					</div>
				</div>

				<div class="battles-block__item-descr">
					<a href='#' class="battles-block__item-name">Yamaha YZF R3A «Thunder»</a>

					<div class="battles-block__item-stat">
						+37
					</div>

					<div class="battles-block__item-battle">
						@svg("battle")
						<span>7</span>
					</div>
				</div>

				<div class="battles-block__item-assets">
					<div class="battles-block__item-like paper-button" data-ripple-color="#ededed">
						@svg("like")
					</div>

					<div class="battles-block__item-more paper-button" data-ripple-color="#ededed">
						<span>Описание мотоцикла</span>

						@svg("arrowBottom")
					</div>
				</div>
			</div>
		</div>

		<div class="battles-assets">
			<div class="battles-assets__title-row">
				<div class="battles-assets__title">
					Рейтинг чемпионов
				</div>
				
				<button class="button paper-button paper-button--hover button--default button--lgm js-regular-block-toggler-button" data-toggler-id="1" data-ripple-color="#b7b7b7">
                	<div class="button__content">
                		<span class="button__text">Принять участие</span>
                	</div>
                </button>
			</div>

			<div class="battles-assets__settings">
				<form class="battles-assets__form">
					<div class="battles-assets__form-row">
						<div class="battles-assets__form-row-inner-row">
							<span class="regular-text _mgr10 regular-text--t1">
								Год выпуска: с
							</span>

							<div class="select-wrapper select-wrapper--sm select-wrapper--grey">
								<select class="js-choice-select">
									<option selected="selected" value="1">2009</option>
									<option value="3">2008</option>
									<option value="2">2007</option>
									<option value="4">2010</option>
								</select>
							</div>
						</div>

						<div class="battles-assets__form-row-inner-row">
							<span class="regular-text _mgr10 regular-text--t1">
								по
							</span>

							<div class="select-wrapper select-wrapper--sm select-wrapper--grey">
								<select class="js-choice-select">
									<option selected="selected" value="1">2011</option>
									<option value="3">2012</option>
									<option value="2">2013</option>
									<option value="4">2014</option>
								</select>
							</div>
						</div>
					</div>

					<div class="battles-assets__form-row">
						<div class="battles-assets__form-row-inner-row">
							<span class="regular-text _mgr10 regular-text--t1">
								Класс:
							</span>

							<div class="select-wrapper select-wrapper--smd select-wrapper--grey">
								<select class="js-choice-select">
									<option selected="selected" value="1">Спорт</option>
									<option value="3">Спорт3</option>
									<option value="2">Спорт4</option>
									<option value="4">Спорт2</option>
								</select>
							</div>
						</div>
					</div>

					<div class="battles-assets__form-row">
						<div class="battles-assets__form-row-inner-row">
							<span class="regular-text _mgr10 regular-text--t1">
								Цена:
							</span>
							
							<div class="battles-assets__form-row-inner-row">
								<input class="form-input form-input--smm" type="text" name="" placeholder="от">
							</div>

							<div class="battles-assets__form-row-inner-row">
								<input class="form-input form-input--smm" type="text" name="" placeholder="до">
							</div>

							<div class="select-wrapper select-wrapper--smm select-wrapper--grey">
								<select class="js-choice-select">
									<option selected="selected" value="1">$</option>
									<option value="3">%</option>
									<option value="2">&</option>
									<option value="4">*</option>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="battles-assets__content js-show-more-block" data-show-more-id="1">
				@for ($i = 0; $i < 2; $i++)
				<div class="battles-item">
					<a href='#' class="battles-item__image">
						<img src="{{ URL::asset('images/item_image_315x214.jpg') }}" alt="" title="">

						<div class="battles-item__counter">
							@svg("battle")

							<span>7</span>
						</div>
					</a>

					<div class="battles-item__descr">
						<a href='#' class="battles-item__name">YAMAHA YZF-R3A</a>

						<div class="battles-item__infos">
							<div class="battles-item__infos-item">Класс: Спорт</div>
							<div class="battles-item__infos-item">Объём двигателя: 320 куб. см.</div>
							<div class="battles-item__infos-item">Макс. мощность: 32 л.с</div>
						</div>

						<div class="battles-item__user-info-row">
							<div class="battles-item__user-info-title">
								Информация о владельце
							</div>

							<div class="battles-item__user-info">
								<div class="battles-item__user-info-left">
									<a href='#' class="battles-item__user-info-image">
										<img src="{{ URL::asset('images/profile_70x70.jpg') }}" alt="" title="">
									</a>

									<div class="battles-item__user-info-rep">
										Репутация: 177
									</div>
								</div>

								<div class="battles-item__user-info-descr">
									<a href='#' class="battles-item__user-info-name">Александр Дюма</a>
									<div class="battles-item__user-info-date">С нами с 19.05.2017</div>
									<div class="battles-item__user-info-text">
										«Иду с этим мотом по жизни. Жизнь слишком коротка, чтобы тащиться на четырех колесах»
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				@endfor
			</div>

			<div class="battles-assets__more-button">
				<button class="button paper-button paper-button--hover button--default button--mds js-show-more-button" data-params="" data-url="/public/battles/NewBattleItems" data-show-more-id="1" data-ripple-color="#b7b7b7">
                	<div class="button__content">
                		<span class="button__text">Показать еще 10</span>

                		<span class="button__icon">
                			@svg("arrowBottom")
                		</span>
                	</div>
                </button>
			</div>

			<div class="battles-assets__accept js-regular-block-toggler" data-toggler-id="1">
				<div class="battles-assets__accept-title-row">
					<div class="battles-assets__accept-title">Заявка на участие в батле</div>

					<div class="battles-assets__accept-subtitle">Принять участие</div>
				</div>

				<div class="battles-assets__accept-content">
					<form class="battles-assets__accept-form">
						<div class="battles-assets__accept-form-top _mgb26">
							<div class="battles-assets__group">
								<div class="button paper-button paper-button--hover button--grey button--lgm button--icon-left" data-ripple-color="#b7b7b7">
					            	<div class="button__content">
					                	@svg("plus")
					                	<span class="button__text">Добавить мотоцикл</span>
					               	</div>
					            </div>

								{{-- <span class="regular-text _mgr10 regular-text--t1">
									Мотоцикл:
								</span>

								<div class="select-wrapper select-wrapper--grey select-wrapper--md">
									<select class="js-choice-select">
										<option selected value="1">Yamaha YZF-R3A</option>
										<option value="3">Yamaha YZF-R3A</option>
										<option value="2">Yamaha YZF-R3A</option>
										<option value="4">Yamaha YZF-R3A</option>
									</select>
								</div> --}}
							</div>

							<div class="battles-assets__accept-form-top-buttons">
								<button class="button paper-button paper-button--hover button--grey button--lgm button--icon-left" data-ripple-color="#b7b7b7">
					            	<div class="button__content">
					                	@svg("camera")
					                	<span class="button__text">Загрузить фото</span>
					               	</div>
					            </button>

								<div class="styled-Checkbox styled-Checkbox--button paper-button" data-ripple-color="#b7b7b7">
									<input type="checkbox" id="use-photo">
									<label for="use-photo">Использовать текущие фото</label>
								</div>
							</div>
						</div>

						<div class="battles-assets__accept-form-top _mgb10">
							<div class="regular-text regular-text--t1">
								Паспортные данные:
							</div>

							<div class="styled-Checkbox styled-Checkbox--regular _mgla">
								<input type="checkbox" id="use-moto-data">
								<label for="use-moto-data">Использовать данные с страницы мотоцикла</label>
							</div>
						</div>

						<div class="form-group">
		                    <label for="js-choice-select" class="form-caption">Год:</label>

							<div class="select-wrapper select-wrapper--lg select-wrapper--grey">
								<select class="js-choice-select">
									<option selected="selected" value="1">2018</option>
									<option value="3">2017</option>
									<option value="2">2016</option>
									<option value="4">2015</option>
									<option value="4">20114</option>
									<option value="4">20113</option>
								</select>
							</div>
						</div>

						<div class="form-group">
		                    <div class="form-item">
		                    	<label for="objem-dvigatelia" class="form-caption">Объем двигателя:</label>
		                    	<input value="" type="text" id="objem-dvigatelia" name="objem-dvigatelia" class="form-input form-input--md">
		                    </div>
						</div>

						<div class="form-group js-add-more-inputs">
		                    <div class="form-item">
		                    	<label class="form-caption">Тюнинг:</label>
		                    	<input value="" type="text" id="tuning1" name="tuning1" class="form-input form-input--md js-more-input">
		                    </div>

		                    <div class="add-more-inputs js-add-more-inputs-button">
		                    	@svg("plus")
		                    </div>
						</div>

						<div class="form-group _df">
							<div class="button paper-button paper-button--hover button--default button--md _mgla js-regular-block-toggler-close" data-ripple-color="#b7b7b7" data-toggler-id="1">
		                    	<div class="button__content">
		                    		<span class="button__text">Отмена</span>
		                    	</div>
		                    </div>

		                    <button class="button paper-button paper-button--hover button--default button--default button--lmd" data-ripple-color="#b7b7b7" type="submit">
		                    	<div class="button__content">
		                    		<span class="button__text">Отправить заявку</span>
		                    	</div>
		                    </button>
						</div>	
					</form>	
				</div>
			</div>
		</div>
	</div>
</section>