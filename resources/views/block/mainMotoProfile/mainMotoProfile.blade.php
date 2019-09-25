<div class="main-moto-profile">
	<div class="main-moto-profile__top">

		<a href="#" class="main-moto-profile__image">
			<img src=" {{ URL::asset('images/main_moto_profile_img_825x450.jpg') }}" alt="" title="">
		<div class="main-moto-profile__image-flag">
			@svg("battle")
			<span>7</span>
		</div>
		</a>

		<div class="main-moto-profile__user-info-wrapper">

			<div class="main-moto-profile__user-info">
				<a class="main-moto-profile__user-info-avatar">
					<img src=" {{ URL::asset('images/main_moto_profile_user-user-info-avatar_50x50.png') }}" alt="" title ="">
				</a>
				<div class="main-moto-profile__user-info-wrapper">
					<div class="main-moto-profile__user-name-geo-wrapper">
						<a href="#" class="main-moto-profile__user-name">
							Александр Зинченко
						</a>
						<a href="#" class="main-moto-profile__user-geo">
							@svg("marker")
							<span>Херсон,UA</span>
						</a>
					</div>
					<div class="main-moto-profile_user-moto">
						Я езжу на <span class="main-moto-profile_user-moto1">Yamaha YZF-R3A</span> и <span class="main-moto-profile_user-moto2">Honda CBR 250 RR</span>
					</div>
				</div>
			</div>

			<div class="main-moto-profile__user-info-buttons">
				<div class="articles-list-item__button">
					<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
						<div class="button__content">
							@svg("pen")
							<span class="button__text">Редактировать</span>
						</div>
					</a>
				</div>
				<div class="articles-list-item__button">
					<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
						<div class="button__content">
							@svg("cross")
							<span class="button__text">Удалить</span>
						</div>
					</a>
				</div>
			</div>

		</div>

	</div>

	<div class="main-moto-profile__user-data">

		<div class="main-moto-profile__top-user-data">
			<div class="main-moto-profile__top-user-data-buttons">
				<a href="#" class="main-moto-profile__top-user-data-button-review">
					<span class="main-moto-profile__top-user-data-button-review-text">
						Отзыв владельца
					</span>
				</a>
				<a href="#" class="main-moto-profile__top-user-data-button-passport">
					<span class="main-moto-profile__top-user-data-button-passport-text">
						Паспортные данные
					</span>
				</a>
			</div>
			<div class="main-moto-profile__top-user-data-icons">
				@svg('trophy')
				<span>13</span>
				@svg('eye')
				<span>3245</span>
				@svg('heart')
				<span>9</span>
				@svg('comment')
				<span>7</span>
			</div>
		</div>
	</div>

	<div class="main-moto-profile__bottom-user-data">
		<div class="main-moto-profile__bottom-user-data-type-of-trans">
			<span class="main-moto-profile__bottom-user-data-type-of-trans-char">
				Тип транспорта:
			</span>
			<span class="main-moto-profile__bottom-user-data-type-of-trans-value">
				Спортбайк
			</span>
		</div>
		<div class="main-moto-profile__bottom-user-data-model">
			<span class="main-moto-profile__bottom-user-data-model-char">
				Модель:
			</span>
			<span class="main-moto-profile__bottom-user-data-model-value">
				Yamaha YZF R3
			</span>
		</div>
		<div class="main-moto-profile__bottom-user-data-year">
			<span class="main-moto-profile__bottom-user-data-year-char">
				Год
			</span>
			<span class="main-moto-profile__bottom-user-data-year-value">
				2016
			</span>
		</div>
		<div class="main-moto-profile__bottom-user-data-vengine">
			<span class="main-moto-profile__bottom-user-data-vengine-char">
				Объем двигателя:
			</span>
			<span class="main-moto-profile__bottom-user-data-vengine-value">
				320 куб. см.
			</span>
		</div>
		<div class="main-moto-profile__bottom-user-data-engine">
			<span class="main-moto-profile__bottom-user-data-engine-char">
				Двигатель
			</span>
			<span class="main-moto-profile__bottom-user-data-engine-value">
				4х тактный
			</span>
		</div>
		<div class="main-moto-profile__bottom-user-data-condition">
			<span class="main-moto-profile__bottom-user-data-condition-char">
				Состояние
			</span>
			<span class="main-moto-profile__bottom-user-data-condition-value">
				Гаражное хранение, Первый владелец, Не бит, Не крашен
			</span>
		</div>
		<div class="main-moto-profile__bottom-user-data-security">
			<span class="main-moto-profile__bottom-user-data-security-char">
				Безопасность
			</span>
			<span class="main-moto-profile__bottom-user-data-security-value">
				ABS, Ветровое стекло
			</span>
		</div>
		<div class="main-moto-profile__bottom-user-data-comfort">
			<span class="main-moto-profile__bottom-user-data-comfort-char">
				Комфорт
			</span>
			<span class="main-moto-profile__bottom-user-data-comfort-value">
				Бортовой компьютер
			</span>
		</div>
	</div>

	<div class="main-moto-profile__logbook-wrapper">

		<div class="main-moto-profile__logbook-top-wrapper">
			<div class="main-moto-profile__logbook-top-title">
				Бортжурнал
			</div>
			<div class="main-moto-profile__logbook-top-records">
				5 записей
			</div>
			<div class="main-moto-profile__logbook-top-sort">
				<select class="main-moto-profile__logbook-top-sort-select">
					<option value="1" selected>по категориям</option>
					<option value="2">по дате</option>
					<option value="3">по популярности</option>
				</select>
			</div>
		</div>

		<div class="main-moto-profile__logbook-accessories-wrapper">
			<div class="main-moto-profile__logbook-accessories-top-wrapper">
				<div class="main-moto-profile__logbook-accesories-top-title">
					Аксессуары
				</div>
				<div class="main-moto-profile__logbook-button-add">
					<a href='#' class="button paper-button paper-button--hover button--default button--md" data-ripple-color="#b7b7b7">
						<div class="button__content">
							@svg("plus")
							<span class="button__text">Добавить запись</span>
						</div>
					</a>
				</div>
			</div>

			<div class="main-moto-profile__logbook-accessories-bottom-wrapper">
@for ($i=0; $i < 10; $i++)
	<div class="main-moto-profile__logbook-item">
		<div class="main-moto-profile__logbook-item-decore"></div>
		<div class="main-moto-profile__logbook-item-image">
			<img src=" {{ URL::asset('images/main_moto_profile_logbook_img1_90x90.jpg') }}" alt="" title="">
		</div>
		<div class="main-moto-profile__logbook-item-middle-wrapper">
			<div class="main-moto-profile__logbook-item-middle-title">
				Новые перчатки, как раз вовремя!
			</div>
			<div class="main-moto-profile__logbook-item-middle-date">
				Опубликовано 17.06.2017
			</div>
		</div>
		<div class="main-moto-profile__logbook-item-right-wrapper">
			<div class="main-moto-profile__logbook-item-right-icons">
				@svg('eye')
				<span>125</span>
				@svg('heart')
				<span>4</span>
				@svg('comment')
				<span>2</span>
			</div>
		</div>
		<div class="main-moto-profile__logbook-item-right-button">
			<a href='/' class="button paper-button paper-button--hover button--whiteborder button--md" data-ripple-color="#b7b7b7">
				<div class="button__content">
					<span class="button__text">Подробней</span>
				</div>
			</a>
		</div>
	</div>
@endfor


			</div>
		</div>

		<div class="main-moto-profile__logbook-impression-wrapper">
			<div class="main-moto-profile__logbook-impression-title">
				Наблюдения и впечатления
			</div>
		 <!-- Место для итемов -->
		</div>

		<div class="main-moto-profile__logbook-repair-wrapper">
			<div class="main-moto-profile__logbook-repair-title">
				Ремонт и обслуживание
			</div>
			<!-- Место для итемов -->
		</div>

	</div>

	<div class="comments-block">
		<div class="comments-block__title">Коментарии к событию </div>

		<div class="comments-block__show-more">
			Показать все 7
		</div>

		<div class="comments-block__comments">
			<div class="comments-block__item">
				<div class="comments-block__item-image">
					<img src="{{ URL::asset('images/profile_50x50.jpg') }}">
				</div>

				<div class="comments-block__item-content">
					<div class="comments-block__item-row">
						<div class="comments-block__item-name">
							Антон Геращенко
						</div>

						<div class="comments-block__item-date">
							11 минут назад
						</div>
					</div>

					<div class="comments-block__text">
						Я как раз думал о такой поездке. С радостью ne присоединюсь!
					</div>
				</div>

				<div class="comments-block__likes">
					@svg("heart")

					<span>3</span>
				</div>
			</div>
		</div>

		<div class="comments-block__leave-comment">
			<div class="comments-block__leave-image">
				<img src="{{ URL::asset('images/profile_50x50.jpg') }}">
			</div>

			<div class="comments-block__leave-comment-content">
				<div class="comments-block__textarea">
					<textarea></textarea>
				</div>

				<div class="comments-block__buttons">
					<button class="button paper-button paper-button--hover button--default button--md _mgla" data-ripple-color="#b7b7b7">
												<div class="button__content">
													<span class="button__text">Отмена</span>
												</div>
										</button>

										<button class="button paper-button paper-button--hover button--default button--white button--md" data-ripple-color="#b7b7b7" type="submit">
												<div class="button__content">
													<span class="button__text">Сохранить</span>
												</div>
										</button>
				</div>
			</div>
		</div>
	</div>

</div>
