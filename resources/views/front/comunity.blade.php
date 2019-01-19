@extends('layouts.front')
@section('content')

@foreach($announcements as $announcement)
	<p> {{$announcement->first_name}} {{$announcement->last_name}} </p>
	<p> Redes: 
		@foreach($announcement->socialNetworks as $social)
			{{$social->link}} - 
		@endforeach
	</p>
		<img src="{{$path.$announcement->image}}" width="250" height="250" style="margin-bottom: 40px; margin-top: 5px">
@endforeach
@endsection