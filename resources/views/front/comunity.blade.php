@extends('layouts.front')
@section('content')

<div class="m-exhibitors">
	<div class="m-exhibitors-wearemoya js-block-watch">
		<img src="{{ asset('images/somosmoya.svg') }}" alt="somos moya">
	</div>
	@foreach($announcements as $key => $announcement)
	<div class="m-exhibitors-box js-block-watch" data-index={{$key}}>
		<div class="m-exhibitors-box-bg" style="background-image:url({{$path.$announcement->image}})"></div>
		<div class="m-exhibitors-box-content">
			<div class="m-exhibitors-title">{{$announcement->brand}}</div>
			<div class="m-exhibitors-social">
				@foreach($announcement->socialNetworks as $social)
					<a href="{{$social->link}}" class="m-exhibitors-social-link" target="_blank">
						@switch($social->name)
							@case('facebook')
								<i class="fab fa-facebook-f"></i>
								@break
							@case('instagram')
								<i class="fab fa-instagram"></i>
								@break
							@case('twitter')
								<i class="fab fa-twitter"></i>
								@break
						@endswitch
					</a>
				@endforeach
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection