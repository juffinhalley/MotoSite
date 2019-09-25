
				<div class="site-search__results-row" data-search-row="articles">
					<div class="site-search__result-aside">
						<div class="site-search__result-name">
							Статьи
						</div>
					</div>

					<div class="site-search__result-content">
						@for ($i = 0; $i < 1; $i++)
						<div class="site-search__regular-item">
							<a href='#' class="article2">
								<div class="acticle2__image">
									<img src="{{ URL::asset('/images/article2_image_260x160.jpg') }}" alt="" title="">
								</div>

								<div class="article2__widgets">
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

								<div class="article2__name">
									Про участие в батлах
								</div>
							</a>
						</div>
						@endfor

						<div class="site-search__regular-item">
							<a href='#' class="button paper-button paper-button--hover button--grey button--md" data-ripple-color="#b7b7b7">
		                     	<div class="button__content">
		                        	<span class="button__text">Смотреть все</span>
		                        </div>
		                    </a>
						</div>
					</div>
				</div>