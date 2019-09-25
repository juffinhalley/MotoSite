<div class="section">
	<div class="container" style="background: aliceblue">
		<form class="user-info-block__data-content js-form" action="" method="post" data-ajax="./hidden/response/demo.json">
			<div class="grid grid--1 grid--psh-2 grid--hspace-def">
				<div class="gcell">
					<label class="checkbox" for="123">
						<input class="checkbox__input" id="123" required value="ewqeqw" name="kakoitoname1" type="checkbox">
						<ins class="checkbox__ins"></ins>
						<span class="checkbox__text">chckbox2</span>
					</label>
				</div>

				<div class="gcell">
					<label class="checkbox" for="321">
						<input class="checkbox__input" id="321" value="ewqeq12" type="checkbox" name="kakoitoname12">
						<ins class="checkbox__ins"></ins>
						<span class="checkbox__text">chckbox21</span>
					</label>
				</div>
			</div>

			<div class="grid grid--1 grid--psh-2 grid--hspace-def _mb-def">
				<div class="gcell">
					<label class="checkbox" for="33332">
						<input class="checkbox__input" id="33332" value="ewqeqw" name="radio1" type="radio" checked>
						<ins class="checkbox__ins"></ins>
						<span class="checkbox__text">radio1</span>
					</label>
				</div>

				<div class="gcell">
					<label class="checkbox" for="2223">
						<input class="checkbox__input" id="2223" value="ewqeq12" type="radio" name="radio1">
						<ins class="checkbox__ins"></ins>
						<span class="checkbox__text">radio2</span>
					</label>
				</div>
			</div>

			<div class="grid _mb-def">
				<div class="gcell gcell--4">
					<div class="form-item">
						<label for="555" class="form-caption">Маил:</label>
						<input value="" required data-rule-email="true" type="text" id="555" name="555" class="form-input">
					</div>
				</div>

				<div class="gcell gcell--8 _pl-def">
					<div class="form-item">
						<label for="111" class="form-caption">Телефон:</label>
						<input value="" required data-rule-phone="true" type="text" id="111" name="111" class="form-input">
					</div>
				</div>
			</div>

			<div class="grid _mb-def grid--hspace-def">
				<div class="gcell gcell--12">
					<div class="form-item">
						<label for="222" class="form-caption">Пароль:</label>
						<input value="" required data-rule-minLength="6" data-rule-password="true" type="password" id="222" name="222" class="form-input">
					</div>
				</div>

				<div class="gcell gcell--4 _ml-auto">
					<div class="form-item">
						<label for="666" class="form-caption">Пароль1:</label>
						<input value="" required data-rule-minLength="6" data-rule-password="true" type="password" id="666" name="666" class="form-input">
					</div>
				</div>

				<div class="gcell gcell--6 gcell--def-12 _pl-def _lg-pl-lg">
					<div class="form-item">
						<label for="777" class="form-caption">Пароль1 еще раз:</label>
						<input value="" required data-rule-minLength="6" data-rule-equalto="[name='666']" data-rule-password="true" type="password" id="777" name="777" class="form-input">
					</div>
				</div>
			</div>

			<div class="grid _flex _items-center _def-items-start  _mb-def grid--hspace-def">
				<div class="gcell gcell--12 gcell--def-4">
					<div class="form-item">
						<label for="333" class="form-caption">Имя:</label>
						<input value="" data-rule-minLength="2" data-rule-word="true" type="text" id="333" name="333" class="form-input">
					</div>
				</div>

				<div class="gcell gcell--6">
					<div class="form-item">
						<label for="444" class="form-caption">Textarea</label>
						<textarea type="textarea" data-rule-minLength="9" data-rule-maxLength="11" required id="444" name="444" class="form-textarea"></textarea>
					</div>
				</div>
			</div>

			<div class="grid _justify-center">
				<div class="gcell gcell--auto">
					<button class="button paper-button paper-button--hover button--default button--white button--md" data-ripple-color="#b7b7b7" type="submit">
						<div class="button__content"><span class="button__text">отправить</span></div>
					</button>
				</div>
			</div>
		</form>

	</div>
</div>
