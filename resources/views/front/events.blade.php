@extends('layouts.front')
@section('content')

@if($event)
<p> Evento: {{$event->name}} </p>
<p> Descripcion: {{$event->description}} </p>
<p> Imagen representativa: <img src="{{$path.$event->image}}"> </p>
	<p>FECHAS</p>

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

	<p>GALERIA</p>
	@foreach($event->gallery as $gkey => $image)
		<p>-----Imagen {{$gkey}}: {{$image->route}}</p>
	@endforeach

	<p>UBICACION</p>
	<p>-----Ciudad: {{$event->ubication->sede->city}}</p>
	<p>-----Calle: {{$event->ubication->street}}</p>
	<p>-----Colonia: {{$event->ubication->colony}}</p>
	<p>-----Numero: {{$event->ubication->number}} </p>

<p>---------------------------------------------------------------------------------------------------------</p>
@endif

@endsection