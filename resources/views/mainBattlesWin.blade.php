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
				@include ('block.logbookTopBlock')

				<div class="grid grid--1">
					<div class="gcell">
						@include ('block.breadcrumbs', ['cls' => '_mgb26'], ['clsnomgl' => '_nomgl'])
					</div>
					<div class="gcell _mb-mg">
						@include('block.battlesNav', ['wins' => ''])
					</div>
					@for ($i=0; $i < 3; $i++)
						<div class="gcell">
							@include ('block.mainBattles', ['win1' => ''])
						</div>
					@endfor
					<div class="gcell _mb-def">
						<div class="gcell _flex _justify-center _items-center">
							<button class="button paper-button paper-button--hover button--showmore button--mds button--sb-content js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
								<div class="button__content">
									<span class="button__text">Показать ещё 15</span>
									<span class="button__icon">
										@svg('arrowBottom')
									</span>
								</div>
								<div class="paper-ripple">
									<div class="paper-ripple__background"></div>
									<div class="paper-ripple__waves"></div>
								</div>
							</button>
						</div>
					</div>
					<div class="gcell _mb-xl">
						<hr class="_spacer1eee">
					</div>
					<div class="gcell _mb-xl">
						@include('widget.pagination')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
