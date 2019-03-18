@extends('layouts.front')
@section('content')

@if($event)
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
				{{$event->ubication->street}} {{$event->ubication->number}}, {{$event->ubication->colony}} {{$event->ubication->sede->city}}
			</div>
		</div>
		<div class="m-event-map">
			<img src="{{$path.$event->image}}" alt="Ubicación de {{$event->name}}">
		</div>
	</div>
@endif

@endsection