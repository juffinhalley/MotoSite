<?php
	$personTop = [
		[
			'top' => ''
		]
	]
?>
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

					@include('block.breadcrumbs', ['clsnomgl'=>'_nomgl'], ['cls' => '_mb-md'])

					@include('block.topNav', ['type' => 'topUser'])

					<div class="grid grid--1 grid--sm-2 grid--md-3 grid--vspace-xl _mb-def">
						@for ($i=0; $i < 9; $i++)
							<div class="gcell">
								@include('block.person', ['item' => $personTop[0]])
							</div>
						@endfor
					</div>

					<div class="grid grid--1 _mb-def">
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

					<hr class="_spacer1eee _mb-xl">

					<div class="grid grid--1 _mb-xl">
						<div class="gcell">
							@include('widget.pagination')
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
@endsection
