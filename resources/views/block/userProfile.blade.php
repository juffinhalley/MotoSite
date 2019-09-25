<?php 
	$menuInfo = [
		[
			"svg"=> "info",
			"text"=> "Инфо",
			"index"=> "0"
		],
		[
			"svg"=> "camera",
			"text"=> "Фото",
			"index"=> "1"
		],
		[
			"svg"=> "video",
			"text"=> "Видео",
			"index"=> "2"
		],
		[
			"svg"=> "feeds",
			"text"=> "Статьи",
			"index"=> "3"
		],
		[
			"svg"=> "callendar",
			"text"=> "События",
			"index"=> "4"
		],
		[
			"svg"=> "announs",
			"text"=> "Обьявы",
			"index"=> "5"
		],
		[
			"svg"=> "helmet",
			"text"=> "Техника",
			"index"=> "6"
		]
	]
?>

<section class="widget">
	<div class="user-profile-block" data-user-id="123">
		<div class="user-profile-block__main-image">
			<img src="{{ URL::asset('images/profile_main_image_855x302.jpg') }}" alt="" title="">

			<div class="change-button-block change-button-block--right">
				@svg("plus")
			</div>
		</div>

		<div class="user-profile-block__row">
			<div class="user-profile-block__avatar">
				<div class="avatar-block">
					<div class="avatar-block__image">
						<img src="{{ URL::asset('images/user_no_photo_150x150.jpg') }}" alt="" title="">

						<div class="change-button-block change-button-block--bottom">
							@svg("plus")
						</div>
					</div>

					<div class="avatar-block__user-descr">
						<div class="avatar-block__user-descr-name">Михаил Булгаков</div>

						<div class="avatar-block__user-descr-city">
							<a href="#">
								@svg("marker")
								<span>Херсон,UA</span>
							</a>
						</div>

						<div class="avatar-block__user-descr-status">
							<a href="#">
								@svg("users")
								<span>Member в «MCC Yamaha»</span>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="user-profile-block__settups">
				@include('block.profileSettups')
			</div>
		</div>

		<div class="profile-bar-block" data-tabs>
			<div class="profile-bar-block__buttons">
				@foreach ($menuInfo as $element)
				<div class="profile-bar-block__button paper-button{{ $element["index"] == 0 ? ' is-active' : '' }}" data-tabs-button="{{ $element['index'] }}" data-ripple-color="#b7b7b7">
					@svg($element['svg'])
					
					<span>{{ $element['text'] }}</span>
				</div>
				@endforeach
			</div>

			<div class="profile-bar-block__items">
				<div class="profile-bar-block__item is-active" data-tabs-container="0">
					@include('block.userInfo')
				</div>
				
				<div class="profile-bar-block__item" data-tabs-container="1">
					@include('block.userPhotos')
				</div>
				
				<div class="profile-bar-block__item" data-tabs-container="2">
					@include('block.userVideos')
				</div>
				
				<div class="profile-bar-block__item" data-tabs-container="3">
					@include('block.userArticles')
				</div>
				
				<div class="profile-bar-block__item" data-tabs-container="4">
					@include('block.userEvents')
				</div>
				
				<div class="profile-bar-block__item" data-tabs-container="5">
					@include('block.userAnnounces')
				</div>
				
				<div class="profile-bar-block__item" data-tabs-container="6">
					@include('block.userTech')
				</div>
			</div>
		</div>
	</div>
</section>


