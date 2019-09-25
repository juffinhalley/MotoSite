@if (isset($typeOfCounters))

	@if ($typeOfCounters == "ehc")

	<div class="widget-button-block">
		@svg('eye')
		<span>3245</span>
	</div>
	<div class="widget-button-block">
		@svg('heart')
		<span>9</span>
	</div>
	<div class="widget-button-block">
		@svg('comment')
		<span>7</span>
	</div>

	@elseif ($typeOfCounters == "teh")

	<div class="widget-button-block">
		@svg('trophy')
		<span>13</span>
	</div>
	<div class="widget-button-block">
		@svg('eye')
		<span>3245</span>
	</div>
	<div class="widget-button-block">
		@svg('heart')
		<span>9</span>
	</div>

	@elseif ($typeOfCounters == "eh")

	<div class="widget-button-block">
		@svg('eye')
		<span>32556</span>
	</div>
	<div class="widget-button-block">
		@svg('heart')
		<span>478</span>
	</div>

	@elseif ($typeOfCounters == "t")

	<div class="widget-button-block">
		@svg('trophy')
		<span>13</span>
	</div>
	@endif

@else
	<div class="widget-button-block">
		@svg('trophy')
		<span>13</span>
	</div>
	<div class="widget-button-block">
		@svg('eye')
		<span>3245</span>
	</div>
	<div class="widget-button-block">
		@svg('heart')
		<span>9</span>
	</div>
	<div class="widget-button-block">
		@svg('comment')
		<span>7</span>
	</div>
@endif
