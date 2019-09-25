@extends('layouts.main')

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content">
				<aside class="page-aside-block page-aside-block--nopd">
					@include('block.sideMenu')

					@include('block.asideMap')
				</aside>

				<div class="page-content page-content--lg">
					@include('block.userProfile')
				</div>
			</div>
		</div>
	</div>
@endsection