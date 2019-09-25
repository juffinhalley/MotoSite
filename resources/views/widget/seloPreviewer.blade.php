@php
	$routes = Route::getRoutes();
@endphp

<div class="selo-previewer">
	<div class="selo-previewer__open js-previewer-trigger">Открыть</div>
	
	<div id="js-selo-previewer-list" class="selo-previewer__list">
		<div class="selo-previewer__close js-previewer-trigger">Закрыть</div>

		@foreach ($routes as $item)
			@if ($item->getName() !== "/" && $item->getName() !== "index")
				<a href="{{ $item->getName() }}" class="selo-previewer__item">
					{{ $item->getName() }}
				</a>
			@endif
		@endforeach
	</div>
</div>
