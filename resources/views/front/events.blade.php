@extends('layouts.front')
@section('content')

@if($event)
	<div id="m-cover" class="m-cover">
		<div class="m-cover-bg" style="background-image:url({{$path.$banner->route}})"></div>
		<div class="m-cover-scroll">
			<div class="m-cover-scroll-label">scroll</div>
			<div class="m-cover-scroll-line"></div>
		</div>
		<div class="m-cover-event">Edicion Navideña</div>
	</div>
	<div class="m-event">
		<div class="m-event-info">
			<h1 class="m-title-block">Próximo Evento</h1>
			<h2 class="m-event-title">{{$event->name}}</h2>
			<div class="m-event-description">{{$event->description}}</div>
			<div class="m-event-date">
			@foreach($event->dates as $dkey => $date)
				<p>-----Fecha {{$dkey}}: {{$date->date}}</p>
				<p>-----HORARIOS</p>
				@foreach($date->schedules as $skey => $schedule)
					<p>----------Horario {{$skey}}: {{$schedule->time}}</p>
					<p>----------ITINERARIOS</p>
					@foreach($schedule->itineraries as $ikey => $itinerary)
						<p>---------------Itinerario {{$ikey}}: {{$itinerary->itinerary}} - {{$itinerary->time}}</p>
					@endforeach
				@endforeach
			@endforeach
			</div>
			<div class="m-event-place">
				<p>-----Ciudad: {{$event->ubication->sede->city}}</p>
				<p>-----Calle: {{$event->ubication->street}}</p>
				<p>-----Colonia: {{$event->ubication->colony}}</p>
				<p>-----Numero: {{$event->ubication->number}} </p>
			</div>
		</div>
		<div id="m-map" class="m-event-map"></div>
	</div>
@endif

@endsection