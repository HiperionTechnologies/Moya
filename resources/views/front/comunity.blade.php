@extends('layouts.front')
@section('content')

<div class="m-exhibitors">
	<div class="m-exhibitors-wearemoya">
		<img src="{{ asset('images/somosmoya.svg') }}" alt="somos moya">
	</div>
	@foreach($announcements as $announcement)
	<div class="m-exhibitors-box">
		<div class="m-exhibitors-box-bg" style="background-image:url({{$path.$announcement->image}})"></div>
		<div class="m-exhibitors-box-content">
			<div class="m-exhibitors-title">{{$announcement->brand}}</div>
			<div class="m-exhibitors-social">
				@foreach($announcement->socialNetworks as $social)
					<a href="{{$social->link}}" class="m-exhibitors-social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
				@endforeach
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection