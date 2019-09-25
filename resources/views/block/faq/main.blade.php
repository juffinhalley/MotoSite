<?php 
	$item = [
			"title" => "Как добавить статью?",
			'text' => "<p>
							Равным образом новая модель организационной деятельности играет важную роль в формировании модели развития. Практический опыт показывает, что рамки и место обучения кадров требует определения и уточнения позиций, занимаемых участниками в отношении поставленных задач? С другой стороны социально-экономическое развитие напрямую зависит от соответствующих условий активизации.
						</p>"
		];

	$items = array_fill(0, 10, $item);
?>

<section class="widget">
	<div class="faq">
		<div class="page-title">
			Ответы на вопросы
		</div>

		<div class="faq-add-question">
			<div class="faq-add-question__text">
				Не нашли ответа на свой вопрос?
			</div>

			<div class="faq-add-question__button">
				<button class="button paper-button paper-button--hover button--white button--lgm js-regular-block-toggler-button" data-toggler-id="1" data-ripple-color="#b7b7b7">
                	<div class="button__content">
                		<span class="button__text">Задать вопрос</span>
                	</div>
                </button>
			</div>

			<div class="faq-add-question__form js-regular-block-toggler" data-toggler-id="1">
				<div class="faq-add-question__title-row">
					<div class="faq-add-question__title">Тех. поддержка вскоре ответит на ваш вопрос и вы получите опове</div>

					<div class="faq-add-question__subtitle">Задать вопрос</div>
				</div>

				<div class="faq-add-question__form-content">
					<form class="form form--question">
						<div class="form-group _mgb20">
			                <div class="form-item">
			                	<label for="question" class="form-caption">Ваш вопрос:</label>
			                	<textarea type="textarea" id="question" name="question" class="form-textarea">Не следует, однако, забывать о том, что постоянное информационно-техническое обеспечение нашей деятельности позволяет оценить значение новых предложений? Повседневная практика показывает, что рамки и место обучения кадров представляет собой интересный эксперимент проверки дальнейших направлений развитая системы массового участия.</textarea>
			                </div>
						</div>

						<div class="form-group _mgb20">
			                <div class="form-item form-item--half">
			                	<label for="email" class="form-caption">Ваш e-mail:</label>
			                	<input type="text" id='email' class="form-input form-input--lg" name="email">
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
			                		<span class="button__text">Написать</span>
			                	</div>
			                </button>
						</div>	
					</form>
				</div>
			</div>
		</div>

		<div class="js-accordion accordion">
			@php
				$index = 0;
			@endphp
			@foreach ($items as $element)
			@php
				$index++;
			@endphp
			<div class="accordion__item" data-accordion-item>
				<div class="accordion__button paper-button" data-accordion-button="{{ $index }}" data-ripple-color="#b7b7b7">
					<div class="accordion__title">
						{{ $element['title'] }}
					</div>

					<div class="accordion__icon">
						@svg('miniArrow')
					</div>
				</div>

				<div class="accordion__content" data-accordion-container="{{ $index }}">
					<div class="wysiwyg">
						{!! $element['text'] !!}
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
