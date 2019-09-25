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

  <div class="comments-block__leave-comment _mgb20">
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
