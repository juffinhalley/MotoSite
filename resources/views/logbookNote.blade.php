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

					<div class="wrapper-content-block">

						@include ('block.breadcrumbs', ['cls'=>'_mgb26'], ['clsnomgl'=>'_nomgl'])

						@include ('block.logbookNote.logbookNoteCover')

						@include ('block.logbookNote.logbookNoteUser')

						@include ('block.logbookNote.logbookNoteContent')

						@include ('block.comments')

				</div>
			</div>
	</div>
</div>
</div>
@endsection
