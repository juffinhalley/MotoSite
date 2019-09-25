<div class="user-records">

	<div class="user-records__info-row">
		<a href="#" class="user-records__title">
			<span class="title-hover"></span>
			Бортжурнал
		</a>
		<div class="user-records__info-row-wrapper">
			<div class="user-records__number-of-records">
				<span>5</span> записей
			</div>
			<div class="user-records__sorting-widget select-wrapper select-wrapper--md">
				<select class="js-choice-select">
					<option selected value="1">по категориям</option>
					<option value="3">по релевантности</option>
					<option value="2">по просмотрам</option>
					<option value="4">по комментариям</option>
				</select>
			</div>
		</div>
	</div>

	<div class="user-records__group-wrapper">
		<div class="user-records__title-wrapper">
			<div class="user-records__content-title">
				Аксессуары
			</div>
			<div class="user-records__add-records-button">
				<a href='#' class="button paper-button paper-button--hover button--default button--mdk" data-ripple-color="#b7b7b7">
				<div class="button__content">
					<span class="button__text">Смотреть все</span>
					<span class="button__icon">@svg("arrowFullRight")</span>
				</div>
			</a>
			</div>
		</div>
		<div class="user-records__content">
			@for ($i = 0; $i < 2; $i++)
				@include ('block.mainMotoProfile.userRecordsItem')
			@endfor
		</div>
	</div>

	<div class="user-records__group-wrapper">
		<div class="user-records__title-wrapper">
			<div class="user-records__content-title">
				Наблюдения и впечатления
			</div>
		</div>
		<div class="user-records__content">
				@include ('block.mainMotoProfile.userRecordsItem')
		</div>
	</div>

	<div class="user-records__group-wrapper">
		<div class="user-records__title-wrapper">
			<div class="user-records__content-title">
				Ремонт и обслуживание
			</div>
		</div>
		<div class="user-records__content">
			@for ($i = 0; $i < 2; $i++)
				@include ('block.mainMotoProfile.userRecordsItem')
			@endfor
		</div>
	</div>

</div>
