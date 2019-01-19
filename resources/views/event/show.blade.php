@extends('layouts.app')
@section('content')

<a href="{{url('event')}}" class="btn btn-danger">Regresar</a>
<h2> Evento - {{$event->name}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<div class="container">
			
			<h4> Descripcion </h4>
			<p> {{$event->description}} </p>

			<h4> Imagen representativa </h4>
			<div style="width: 50%; margin-left: 25%;">
				<img src="{{$path.$event->image}}" width="100%" height="200" style='margin-bottom:20px;'>
			</div>

			<h4>FECHAS</h4>
			@if(count($event->dates) > 0)
				<a href="{{URL::action('DateController@create',[$event->id])}}" class="btn btn-primary btn-sm" style='margin-bottom:2px;'> Nueva Fecha</a>
				@foreach($event->dates as $date)
					@include('event.table_date',[$date])
					@if(count($date->schedules) > 0)
						<a href="{{URL::action('ScheduleController@create',[$event->id, $date->id])}}" class="btn btn-primary btn-sm" style='margin-left:15%; margin-bottom:2px;'>Nuevo Horario</a>
						@foreach($date->schedules as $schedule)
							@include('event.table_schedule',[$schedule])
							<a href="{{URL::action('ItineraryController@create',[$event->id,$date->id,$schedule->id])}}" class="btn btn-primary btn-sm" style='margin-left:30%; margin-bottom:2px;'>Nuevo Itinerario</a>
							@include('event.table_itineraries',[$schedule])
							@include('schedule.modal')
						@endforeach	
						@include('date.modal')
					@else
						<a href="{{URL::action('ScheduleController@create',[$event->id, $date->id])}}" class="btn btn-primary btn-sm" style='margin-bottom:20px;'>Nuevo Horario</a>
						@endif
				@endforeach
			@else
				<a href="{{URL::action('DateController@create',[$event->id])}}" class="btn btn-primary btn-sm" style='margin-bottom:20px;'> Nueva Fecha</a>
			@endif

			<h4 style="width: 100%"> Ubicacion </h4>
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

			<h4>GALERIA</h4>
			<a href="{{URL::action('GalleryController@create',$event->id)}}" class="btn btn-primary btn-sm" style='margin-bottom:2px;'>Agregar Imagenes</a>
			@if(count($event->gallery) > 0)
				<div style="width: 100%">
				@foreach($event->gallery as $image)
					<div style="float: left; width: 23%; margin-left: 1%; margin-right: 1%, margin-bottom: 1%">
						<img src="{{$path.$image->route}}" width="100%" height="200" style='margin-bottom: 1%;'>
						<a href="{{URL::action('GalleryController@edit',[$event->id,$image->id])}}" class="btn btn-primary btn-sm" style='margin-bottom:5%;'> Editar Imagen</a>
						<a href="" class="btn btn-danger btn-sm" style='margin-bottom:5%;' data-target="#modal-delete-{{$event->id}}-{{$image->id}}" data-toggle="modal">Eliminar</a>
					</div>
					@include('gallery.modal')
				@endforeach
				</div>
			@endif
		</div>
	</div>
</div>

@endsection