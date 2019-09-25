
<?php
	$locale = App::getLocale();
?>

<header id="js-header" class="page-header-block">
	<div class="container">
		<div class="page-header-block__content">
			<div class="page-header-block__burger">
				<div id="js-burger" class="burger-block">
					<div class="burger-block__content">
						<span class="burger-block__decor"></span>
						<span class="burger-block__decor"></span>
						<span class="burger-block__decor"></span>
					</div>
				</div>
			</div>		

			<div class="page-header-block__logo">
				<a href='/' class="logo-block svg-wrapper">
					@svg('motosite_logo')
				</a>
			</div>

			<div class="page-header-block__widgets">
				<div class="header-widget-block header-widget-block--thieves">
					<div class="header-widget-block__icon svg-wrapper">
						@svg('secret')

						<div class="header-widget-block__noty">
							0
						</div>
					</div>
				</div>

				<div class="header-widget-block">
					<div class="header-widget-block__icon svg-wrapper">
						@svg('comment')

						<div class="header-widget-block__noty">
							0
						</div>
					</div>
				</div>

				<div class="header-widget-block">
					<div class="header-widget-block__icon svg-wrapper">
						@svg('bell')

						<div class="header-widget-block__noty">
							0
						</div>
					</div>
				</div>
			</div>

			<div class="page-header-block__search">
				<div id="js-show-search-button" class="decored-search-block">
					<div class="decored-search-block__text">
						Поиск..
					</div>

					<div class="decored-search-block__button">
						@svg('search')
					</div>
				</div>
			</div>

			<div class="page-header-block__profile">
				<div id="js-profile-block" class="profile-block">
					<div class="profile-block__wrapper">
						<div id='js-profile-button' class="profile-block__content">
							<div class="profile-block__image">
								<img src="{{ URL::asset('/images/profile_70x70.jpg') }}" alt="" title="">
							</div>

							<div class="profile-block__name">
								Михаил Булгаков
							</div>

							<div class="profile-block__decor">
								<div class="cog-decor-block">
									<div class="cog-decor-block__cog svg-wrapper">
										@svg('cog')
									</div>

									<div class="cog-decor-block__arrow svg-wrapper">
										@svg('miniArrow')
									</div>
								</div>
							</div>
						</div>

						<div id="js-profile-menu" class="profile-block__menu">
							<?php 
								$items = [
									"Мой профиль",
									"Редактировать",
									"Настройки",
									"Статистика",
									"Выйти"
							]; ?>

							@foreach ($items as $item)
								<div class="profile-block__menu-item">
									<a href='#' class="profile-block__menu-link">
										{{ $item }}
									</a>
								</div>
			        		@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</header>


