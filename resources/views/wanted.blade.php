@extends('layouts.main')

@section('content')
	<div class="section">
		<div class="container">
			<div class="page-content-wrapper__content _mgb120">
				<aside class="page-aside-block">
					@include('block.sideMenu')

					@include('block.asideMap')
				</aside>

				<div class="page-content">
					@include('block.wanted')
				</div>
			</div>
		</div>
	</div>
@endsection

