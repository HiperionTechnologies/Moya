@extends('layouts.app')
@section('content')

<h2> Evento - {{$event->name}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<div class="container">
			
			<h4> Descripcion </h4>
			<p> {{$event->description}} </p>

			<h4> Imagen representativa </h4>
			<img src="{{$path.$event->image}}" width="300" height="200">

			@if(count($event->dates) > 0)
				<h4>FECHAS</h4>
				<a href="{{URL::action('DateController@create',[$event->id])}}" class="btn btn-primary btn-sm">
				Nueva Fecha</a>
				@foreach($event->dates as $date)
					@include('event.table_date',[$date])
					<a href="{{URL::action('ScheduleController@create',[$event->id, $date->id])}}" class="btn btn-primary btn-sm" style='margin-left:15%;'>Nuevo Horario</a>
					@foreach($date->schedules as $schedule)
						@include('event.table_schedule',[$schedule])
						<a href="{{URL::action('ItineraryController@create',[$event->id,$date->id,$schedule->id])}}" class="btn btn-primary btn-sm" style='margin-left:30%;'>Nuevo Itinerario</a>
						@include('event.table_itineraries',[$schedule])
						@include('schedule.modal')
					@endforeach	
					@include('date.modal')
				@endforeach
			@endif

			@if(count($event->gallery) > 0)
				<p>GALERIA</p>
				@foreach($event->gallery as $gkey => $image)
					<p>-----Imagen {{$gkey}}: {{$image->route}}</p>
				@endforeach
			@endif

			<h4> Ubicacion </h4>

			<table class="table table-bordered table-hover table-sm">
				<thead class="table-dark">
					<tr>
						<th> Ciudad </th>
						<th> Nombre </th>
						<th> Calle </th>
						<th> Colonia </th>
						<th> Numero </th>
					</tr>
				</thead>
				<tbody>	
					<tr> 
						<td> {{$event->ubication->sede->city}} </td>
						<td> {{$event->ubication->name}} </td>
						<td> {{$event->ubication->street}} </td>
						<td> {{$event->ubication->colony}} </td>
						<td> {{$event->ubication->number}} </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection