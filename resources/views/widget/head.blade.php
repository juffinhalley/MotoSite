<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Страница нейм</title>
	<meta name="description" lang="{{ app()->getLocale() }}" content="description">
	<meta name="keywords" lang="{{ app()->getLocale() }}" content="keywords">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Временный для вёрстки -->
	<meta name="robots" content="noindex, nofollow">

	<!-- Open graph -->
	<meta property="og:title" content="Главная страница">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="vmmoto">
	<meta property="og:url" content="">
	<meta property="og:description" content="Краткий текст (новости, товара и т.д)">

	<!-- Touch -->
	<meta name="format-detection" content="telephone=no">
	<meta name="format-detection" content="address=no">

	<!-- Responsive -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	{{-- favicons --}}
	<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ URL::asset('favicons/site.webmanifest') }}">
	<link rel="mask-icon" href="{{ URL::asset('favicons/safari-pinned-tab.svg') }}" color="#000000">
	<meta name="msapplication-TileColor" content="#1f1f1f">
	<meta name="theme-color" content="#ffffff">

	<!-- Styles -->
	<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >

	{{-- fonts --}}
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Black.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Black.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Bold.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Heavy.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Heavy.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Italic.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Italic.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Light.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Light.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Medium.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Medium.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Roman.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Roman.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Thin.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-Thin.woff') }}" as="font" type="font/woff" crossorigin>
	
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-UltraLight.woff2') }}" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="{{ URL::asset('fonts/subset-HelveticaNeueCyr-UltraLight.woff') }}" as="font" type="font/woff" crossorigin>

	<script>
		window.siteManager = {};
		document.documentElement.classList.add("page-preloading");
	</script>
</head>