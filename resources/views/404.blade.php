@extends('layouts.main')


@section('content')
	<div class="section">
		<div class="page-content-wrapper__content">
			<div class="page-content">
				<section class="widget">
					<div class="error404-page" style="background-image: url({{ URL::asset('images/404bg.jpg') }})">
						<div class="container">
							<div class="error404-content">
								<div class="error-title">Похоже что-то пошло не так!</div>
								<div class="error-text">
									Страница не существует! Возможно, она была удалена или даже никогда не существовала. 
								</div>

								<div class="error-text _mgb40">
									Чтобы найти нужную информацию, рекомендуем  воспользоваться поиском или перейти на главную страницу
								</div>

								<a href='#' class="button paper-button paper-button--hover button--white button--lgm" data-ripple-color="#b7b7b7">
				                	<div class="button__content">
				                		<span class="button__text">Вернуться на главную</span>
				                	</div>
				                </a>	
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
@endsection

