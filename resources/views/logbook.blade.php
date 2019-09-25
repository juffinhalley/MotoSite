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
				<div class="container container--no-gap">
					@include ('block.logbookTopBlock')

					@include ('block.breadcrumbs', ['cls'=>'_mgb26'], ['clsnomgl'=>'_nomgl'])

					@include('block.logbookNav')

					<div class="logbook_items _df _fdc js-show-more-block" data-show-more-id="1">
						@for ($i = 0; $i
						< 5; $i++) @include ('block.logbookListItem', ['square' => ''])
						@endfor
					</div>

					<div class="logbook__show-more-button _df _jcc _w100 _mgb26">
						<button class="button paper-button paper-button--hover button--default button--mds js-show-more-button" data-params="" data-url="/getNewLogbook" data-show-more-id="1" data-ripple-color="#b7b7b7">
							<div class="button__content">
								<span class="button__text">Показать еще 10</span>
								<span class="button__icon">
									@svg("arrowBottom")
								</span>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
