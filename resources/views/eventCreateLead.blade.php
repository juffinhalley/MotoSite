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
				<div class="event-create event-create--lead">

					<div class="event-create__title-wrapper">
						<div class="event-create__title-left">
							Создание страницы события
						</div>
						<div class="event-create__title-right">
							Добавить событие
						</div>
					</div>
					<div class="event-create__wrapper">

						<div class="event-create__time-wrapper">
							<div class="event-create__date">
								<div class="form-item form-item--wicon">
									<input type="text" required data-error-text="Выберите дату" data-rule-date="true" class="form-input form-input--lg" name="date-of-event" id="date-of-event" value="">
									<label for="date-of-event" class="form-icon form-icon--ms">
										@svg('callendar2')
									</label>
								</div>
							</div>
							<div class="event-create__time">
								<div class="form-item form-item--wicon">
									<input type="text" data-error-text="Выберите время" required data-rule-time="true" class="form-input form-input--lg" name="time-of-event" id="time-of-event" value="">
									<label for="time-of-event" class="form-icon form-icon--ms">
										@svg('callendar2')
									</label>
								</div>
							</div>
						</div>

						<div class="event-create__geo">
							<div class="form-item form-item--wicon">
								<input type="text" required data-rule-date="true" class="form-input form-input--lg" name="js-form-geo-of-event" id="js-form-geo-of-event" value="">
								<label for="js-form-geo-of-event" class="form-icon form-icon--ms">
									@svg('marker')
								</label>
							</div>
						</div>

						<div class="event-create__name">
							<div class="form-item">
								<input type="text" required data-rule-word="true" class="form-input form-input--lg" name="name-of-event" id="name-of-event" value="">
							</div>
						</div>

						<div class="event-create__publish">
							<div class="form-item">
								<div class="select-wrapper select-wrapper--mg">
									<select class="js-choice-select" data-select-search="false">
										<option value="0">Опубликовать от своего имени</option>
										<option value="1">Опубликовать от имени мотоклуба &laquo;МСС Yamaha&raquo;</option>
									</select>
								</div>
							</div>
						</div>

						<div class="event-create__download">
							@include('block.dlPhotoItem', ['downloadCover' => ''])
						</div>

						<div class="event-create__new-textarea">
							<textarea data-rule-minlength="5" data-rule-maxLength="120" name="event-create-textarea" id="event-create-textarea" class="form-textarea" rows="2"></textarea>
							<a href="#" class="event-create__textarea-delete">
								@svg('crestRound')
							</a>
						</div>

						<div class="event-create__actions">
							@include('block.createActions')
						</div>

						<div class="event-create__alert">
							Ваше событие отобразится в ленте актуальных событий после подтверждения его 15-ю другими пользователями. После успешного создания 3-х событий подтверждение не требуется.
						</div>

						<div class="event-create__buttons">
							<button class="button button--empty _mr-def">
								<div class="button__content">
									<span class="button__text">
										Отмена
									</span>
								</div>
							</button>
							<button class="button button--def button--llGrey paper-button paper-button--hover" data-ripple-color="#b7b7b7">
								<div class="button__content">
									<span class="button__text">
										Создать
									</span>
								</div>
							</button>
						</div>
					</div>


				</div>

			</div>
		</div>
	</div>
</div>
@endsection
