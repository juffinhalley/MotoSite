<?php
	$menues = [
		[
			"title" => "Основное",
			"items" => [
				"Мотоциклы",
				"Запчасти",
				"В угоне",
				"Люди",
				"События",
				"Сообщества"
			]
		],
		[
			"title" => "Места на карте",
			"items" => [
				"Мотосалоны",
				"Мотошколы",
				"СТО",
				"Места сбора",
				"Места отдыха",
				"Интересные места"
			]
		],
		[
			"title" => "Сайт",
			"items" => [
				"О сайте",
				"Помощь",
				"Правила"
			]
		]
	];
?>

<footer id="js-footer" class="page-footer-block">
	<div class="container">
		<div class="page-footer-block__content">
			<div class="page-footer-block__row page-footer-block__row--top">
				<?php foreach ($menues as $value) { ?>
				<div class="page-footer-block__submenu">
					<div class="submenu-block">
						<div class="submenu-block__title">{{ $value['title'] }}</div>

						<div class="submenu-block__list">
							<?php foreach ($value['items'] as $submenuItem) { ?>
							<div class="submenu-block__list-item">
								<a href='#' class="submenu-block__list-link">
									{{ $submenuItem }}
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

			<div class="page-footer-block__row page-footer-block__row--bottom">
				<div class="page-footer-block__copy">
					<div class="copyrighting-block">
						Социальная сеть мотоциклистов, MotoSite © 2018 Copyright. Все права защищены.
					</div>
				</div>

				<div class="page-footer-block__logo">
					<a href='#' class="vm-logo-block">
						@svg('vmLogo')
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
