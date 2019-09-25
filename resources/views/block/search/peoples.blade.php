
				<div class="site-search__results-row" data-search-row="peoples">
					<div class="site-search__result-aside">
						<div class="site-search__result-name">
							Люди
						</div>
					</div>

					<div class="site-search__result-content">
						<div class="site-search__peoples">
							@for ($i = 0; $i < 5; $i++)
								<div class="site-search__regular-item">
									@include('block.person')
								</div>
							@endfor
						</div>

						<div class="site-search__regular-item site-search__regular-item--sm">
							<a href='#' class="button paper-button paper-button--hover button--grey button--md" data-ripple-color="#b7b7b7">
		                     	<div class="button__content">
		                        	<span class="button__text">Смотреть все</span>
		                        </div>
		                    </a>
						</div>
					</div>
				</div>