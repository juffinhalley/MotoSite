@extends('layouts.main')


@section('content')
	<div class="section">
		<div class="page-content-wrapper__content">
			<div class="page-content">
				<section class="widget">
					<div class="error403-page" style="background-image: url({{ URL::asset('images/403bg.jpg') }})">
						<div class="container">
							<div class="error403-content">
								<div class="error-title">Доступ запрещен!</div>
								<div class="error-text">
									Похоже вы пытаетесь получить доступ к странице которая находиться вне ваших прав доступа.
								</div>
								<div class="error-text">
									Если это недоразумение, тогда советуем связаться с администрацией <a href='mailto:admin@motosite.com'>admin@motosite.com</a>
								</div>		
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
@endsection

