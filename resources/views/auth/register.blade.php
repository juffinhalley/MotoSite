@extends('layouts.main')

@section('content')

<div class="section">
	<div class="container">
		<div class="page-content page-content--register">
            <div class="grid _w100 _mb-xl">
                <div class="gcell gcell--1"></div>

                <div class="gcell gcell--10">
                    <div class="page-title _mb-def">Регистрация</div>

                    <hr class="_hr">
                </div>

                <div class="gcell gcell--1"></div>
            </div>

            <form class="form no-js" method="post" data-ajax="./hidden/response/demo.json" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                <div class="grid grid--hspace-xl">
                    <div class="gcell gcell--12 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="">
                                Выберите тип учетной записи
                            </label>

                           <div class="select-wrapper select-wrapper--w100 select-wrapper--item-type select-wrapper--mdm">
                                <select class="js-choice-select">
                                    <option selected value="1">Пользователь</option>
                                    <option value="3">Админ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="name">
                                Введите ваше имя*
                            </label>

                            <input type="text" required data-rule-word="true" data-rule-minLength="2" class="form-input form-input--msm" name="name" id="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="reg-lastname">
                                Введите вашу фамилию*
                            </label>

                            <input type="text" data-rule-word="true" data-rule-minLength="2" class="form-input form-input--msm" name="reg-lastname" id="reg-lastname" value="">
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="email">
                                Введите ваше e-mail*
                            </label>

                            <input type="text" required data-rule-email="true" class="form-input form-input--msm" name="email" id="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="reg-mail">
                                Выберите вашe страну*
                            </label>

                            <div class="select-wrapper select-wrapper--item-type select-wrapper--w100 select-wrapper--mdm">
                                <select class="js-choice-select">
                                    <option selected value="1">Украина</option>
                                    <option value="3">Россия</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="re12">
                                Выберите ваш город*
                            </label>

                            <div class="select-wrapper select-wrapper--item-type select-wrapper--w100 select-wrapper--mdm">
                                <select class="js-choice-select">
                                    <option selected value="1">Херсон</option>
                                    <option value="3">Киев</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="r123">
                                Введите ваш город
                            </label>

                            <input type="text" data-rule-email="true" class="form-input form-input--msm" name="r123" id="r123" value="">
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item form-item--wiconr">
                            <label class="form-caption _mb-sm" for="password">
                                Введите пароль
                            </label>

                            <input type="password" 
                                data-rule-minLength="6" 
                                data-password-input 
                                data-rule-equalto="[name='password_confirmation']" 
                                data-rule-password="true" required class="form-input form-input--msm" name="password" id="password" value="">
                                
                            <label for="password" class="form-icon form-icon--ms" data-password-input-changer>
                                @svg('eye')
                            </label>
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item form-item--wiconr">
                            <label class="form-caption _mb-sm" for="password_confirmation">
                                Повторите пароль
                            </label>

                            <input type="password" 
                                data-rule-minLength="6" 
                                data-password-input 
                                data-rule-equalto="[name='password']"
                                data-rule-password="true" required class="form-input form-input--msm" name="password_confirmation" id="password_confirmation" value="">
                                
                            <label for="password_confirmation" class="form-icon form-icon--ms" data-password-input-changer>
                                @svg('eye')
                            </label>
                        </div>
                    </div>

                    <div class="gcell gcell--12 _mb-xl">
                        <div class="grid _w100">
                            <div class="gcell gcell--1"></div>

                            <div class="gcell gcell--10">
                                <hr class="_hr">
                            </div>

                            <div class="gcell gcell--1"></div>
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="11">
                                Выберите дату рождения
                            </label>

                            будет потом
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="phone">
                                Введите телефон
                            </label>

                            <input type="text" data-rule-phone="true" class="form-input form-input--msm" name="phone" id="phone" value="">
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="drive_exp">
                                Опыт вождения
                            </label>

                            <input type="text" class="form-input form-input--msm" name="drive_exp" id="drive_exp" value="">
                        </div>
                    </div>

                    <div class="gcell gcell--12 gcell--psh-6 _mb-xl">
                        <div class="form-item">
                            <label class="form-caption _mb-sm" for="skype">
                                Skype
                            </label>

                            <input type="text" class="form-input form-input--msm" name="skype" id="skype" value="">
                        </div>
                    </div>

                    <div class="gcell gcell--12 _mb-xl">
                        <div class="grid _w100">
                            <div class="gcell gcell--1"></div>

                            <div class="gcell gcell--10">
                                <hr class="_hr">
                            </div>

                            <div class="gcell gcell--1"></div>
                        </div>
                    </div>

                    <div class="gcell gcell--12 _mb-xl">
                        <div class="text text--sm text--grey _text-center">
                            Регистрируясь вы соглашаетесь с <a class="link link--black" href="/">пользовательским соглашением.</a> 
                        </div>
                    </div>

                    <div class="gcell gcell--12 _flex _justify-center">
                        <button type="submit" class="button paper-button paper-button--hover button--red button--lg button--text-lg" data-ripple-color="#b7b7b7">
                            <div class="button__content">
                                <span class="button__text">Зарегистрироваться</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>

            <hr class="_spacer40">
        </div>
    </div>
</div>
@endsection
