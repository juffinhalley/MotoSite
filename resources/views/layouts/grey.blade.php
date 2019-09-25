<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('widget.head')

    <body>
    	<div class="global-wrapper global-wrapper--grey">
	    	@include('block.header')

            <div class="page-content-wrapper">
	            @yield('content')
	        </div>

	        @include('block.footer')
    	</div>

        @include('widget.hidden')
        
        @include('widget.noscript')
    </body>
</html>
