

				<div class="site-search__results-row" data-search-row="battles">
					<div class="site-search__result-aside">
						<div class="site-search__result-name">
							Батлы
						</div>
					</div>

					<div class="site-search__result-content">
						<div class="site-search__result-battles">
							@for ($i = 0; $i < 2; $i++)
							<a href='#' class="battle-result">
								<!-- <div class="battle-result__descr-row">
									<div class="battle-result__item" style="background-image: url({{ URL::asset('/images/battle_image1_290x200.jpg') }})">
										<div class="battle-result__item-image">
											<span></span>
											{{-- <img src="{{ URL::asset('/images/battle_image1_290x200.jpg') }}" alt="" title=""> --}}
										</div>
									</div>

									<div class="battle-result__item" style="background-image: url({{ URL::asset('/images/battle_image2_290x200.jpg') }})">
										<div class="battle-result__item-image">
											<span></span>
											{{-- <img src="{{ URL::asset('/images/battle_image2_290x200.jpg') }}" alt="" title=""> --}}
										</div>
									</div>

									<div class="battle-result__timer">До конца батла 03:29:19</div>

									<div class="battles-block__battle-decor">
										@svg("battle")
									</div>
								</div> -->

								<div class="battle-result__items">
									<div class="battle-result__item">
										<div class="battle-result__item-image">
											<img src="{{ URL::asset('/images/battle_image2_290x200.jpg') }}" alt="" title="">
										</div>

										<div class="battle-result__item-name">
											Honda CBR 250 RR «Smoker»
										</div>
									</div>

									<div class="battle-result__item">
										<div class="battle-result__item-image">
											<img src="{{ URL::asset('/images/battle_image1_290x200.jpg') }}" alt="" title="">
										</div>

										<div class="battle-result__item-name">
											Yamaha YZF R3A «Thunder»
										</div>
									</div>

									<div class="battles-block__battle-decor is-active">
										@svg("battle")
									</div>
								</div>
							</a>
							@endfor
						</div>

						<div class="battle-result__show-all">
							<a href='#' class="button paper-button paper-button--hover button--grey button--md" data-ripple-color="#b7b7b7">
		                     	<div class="button__content">
		                        	<span class="button__text">Смотреть все</span>
		                        </div>
		                    </a>
						</div>
					</div>
				</div>