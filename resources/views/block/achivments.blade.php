

<section class="widget">
	<div class="{{ isset($clsachiv) ? $clsachiv : "" }}">
		@for ($i = 0; $i < 3; $i++)
		<div class="achivments-item">
			<div class="achivments-item__image {{ isset($clsbr100) ? $clsbr100 : '' }}">
				<img src="{{ URL::asset('images/trophy.png') }}" alt="" title="">
			</div>

			<div class="achivments-item__content">
				<div class="achivments-item__title">
					Статья месяца
				</div>

				<div class="achivments-item__text">
					Данная награда даеться за уровень гражданского сознания играет важную роль в формировании дальнейших направлений развитая системы массового участия. Не следует, однако, забывать о том, что повышение уровня гражданского сознания напрямую зависит от ключевых компонентов планируемого обновления.
				</div>

				<div class="achivments-item__date">
					Получено 18.04.17
				</div>
			</div>
		</div>
		@endfor
	</div>
</section>
