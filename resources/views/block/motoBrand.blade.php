<?php
	$brands = [
		[
			'brand' => 'Adler'
		],
		[
			'brand' => 'Aprilia'
		],
		[
			'brand' => 'Beta'
		],
		[
			'brand' => 'Buell'
		],
		[
			'brand' => 'Cagiva'
		],
		[
			'brand' => 'CFMOTO'
		],
		[
			'brand' => 'Derbi'
		],
		[
			'brand' => 'Ducati'
		],
		[
			'brand' => 'Gilera'
		],
		[
			'brand' => 'Harley-Davidson'
		],
		[
			'brand' => 'Husaberg'
		],
		[
			'brand' => 'Husqvarna'
		],
		[
			'brand' => 'Hyosung'
		],
		[
			'brand' => 'Indian'
		],
		[
			'brand' => 'Jawa'
		]
	];
	$models = [
		[
			'model' => 'YZF-R'
		],
		[
			'model' => 'TZR'
		],
		[
			'model' => 'FJR'
		],
		[
			'model' => 'VMAX'
		],
		[
			'model' => 'XJR'
		],
		[
			'model' => 'XSR'
		],
		[
			'model' => 'SCR'
		],
		[
			'model' => 'MT'
		],
		[
			'model' => 'FZ'
		],
		[
			'model' => 'FZ-S'
		],
		[
			'model' => 'XJ'
		],
		[
			'model' => 'SR'
		],
		[
			'model' => 'YBR'
		],
		[
			'model' => 'YS'
		],
		[
			'model' => 'Star'
		]
	];
	$submodels = [
		[
			'submodel' => 'R1'
		],
		[
			'submodel' => 'R6'
		],
		[
			'submodel' => 'R3'
		],
		[
			'submodel' => 'R15'
		],
		[
			'submodel' => 'R125'
		]
	];
	$motorcycles = [
		[
			'motorcycle' => 'R1',
			'born' => '1998'
		],
		[
			'motorcycle' => 'R1',
			'born' => '1999'
		],
		[
			'motorcycle' => 'R1',
			'born' => '2000-2001'
		],
		[
			'motorcycle' => 'R1',
			'born' => '2002-2003'
		],
		[
			'motorcycle' => 'R1',
			'born' => '2004-2005'
		],
		[
			'motorcycle' => 'R1',
			'born' => '2006'
		],
		[
			'motorcycle' => 'R1',
			'born' => '2007-2008'
		],
		[
			'motorcycle' => 'R1',
			'born' => '2009-2014'
		],
		[
			'motorcycle' => 'R1',
			'born' => '2016- '
		]
	]
?>
<div class="moto-brand {{ isset($typeMotorcycles) ? 'moto-brand--motorcycle' : '' }}">

	@if (isset($typeBrands) || isset($typeModels) || isset($typeSubmodels))
	<div class="grid grid--1 grid--sm-3 grid--md-5">
		@if (isset($typeBrands))
		@foreach ($brands as $item)
		<div class="gcell">
			<a href="#" class="moto-brand__item">
				{{ $item['brand'] }}
			</a>
		</div>
		@endforeach
		@elseif (isset($typeModels))
		@foreach ($models as $item)
		<div class="gcell">
			<a href="#" class="moto-brand__item">
				{{ $item['model'] }}
			</a>
		</div>
		@endforeach
		@elseif (isset($typeSubmodels))
		@foreach ($submodels as $item)
		<div class="gcell">
			<a href="#" class="moto-brand__item">
				{{ $item['submodel'] }}
			</a>
		</div>
		@endforeach
		@endif
	</div>
	@endif

	@if (isset($typeMotorcycles))
	<div class="grid grid--2 grid--sm-3 grid--psh-4">
		@if (isset($typeMotorcycles))
		@foreach ($motorcycles as $item)
		<div class="gcell">
			<a href="#" class="moto-brand__photo-item">
				<div class="moto-brand__image">
					<img src="{{ URL::asset('images/motorcycle_205x130.jpg') }}" alt="">
				</div>
				<div class="moto-brand__title">
					<span class="moto-brand__motorcycle">
						{{ $item['motorcycle'] }}
					</span>
					<span class="moto-brand__born">
						({{ $item['born'] }})
					</span>
				</div>
			</a>
		</div>
		@endforeach
		@endif
	</div>
	@endif


	@if (isset($typeBrands) || isset($typeModels))
	<div class="grid grid--1">
		<div class="gcell">
			<button class="button paper-button paper-button--hover button--lgmd button--showmore-t2 js-show-more-button" data-params="" data-url="" data-show-more-id="1" data-ripple-color="#b7b7b7" style="color: rgb(183, 183, 183);">
				<div class="button__content">
					<span class="button__text">Показать все</span>
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
	@endif

</div>
