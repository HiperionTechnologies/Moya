@extends('layouts.front')
@section('content')

@if($event)
	<div class="m-event js-block-watch">
		<div class="m-title-block">Próximo Evento</div>
		<div class="m-event-container">
			<div class="m-event-info">
				<h1 class="m-event-title">{{$event->name}}</h1>
				<div class="m-event-description">{{$event->description}}</div>
				<div class="m-event-date-container">
					<i class="fas fa-calendar-alt"></i>
					<div class="m-event-date">
						<span>Fecha</span>
						@foreach($event->dates as $dkey => $date)
							{{ date('d-M-Y', strtotime($date->date)) }}
						@endforeach
					</div>
				</div>
				<div class="m-event-place-container">
					<i class="fas fa-map-marker-alt"></i>
					<div class="m-event-place">
						<span>Lugar</span>
						<strong>{{$event->ubication->name}}</strong>, {{$event->ubication->street}} {{$event->ubication->number}}, {{$event->ubication->colony}} {{$event->ubication->sede->city}}
					</div>
				</div>
				<a href="http://maps.google.com/maps?&z=15&mrt=yp&t=k&q={{$event->ubication->latitude}}+{{$event->ubication->longitude}}" class="m-event-howtoget m-btn-black" target="_blank">
					Como llegar
				</a>
			</div>
			<div class="m-event-map">
				<img src="{{$path.$event->image}}" alt="Ubicación de {{$event->name}}">
			</div>
		</div>
	</div>
@endif

@endsection