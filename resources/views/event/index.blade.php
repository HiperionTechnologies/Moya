@extends('layouts.app')
@section('content')

<h2> Eventos 
	<a href="event/create" class="btn btn-primary">Nuevo Evento</a>
</h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover table-sm">
			<thead class="table-dark">
				<tr align="center">
					<th>ID</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th>SEDE</th>
					<th colspan="4">OPCIONES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
					<tr align="center">
						<td> {{$event->id}} </td>
						<td> {{$event->name}} </td>
						<td> {{$event->description}} </td>
						<td> {{$event->ubication->sede->city}} </td>
						<td>
							<a href="{{URL::action('EventController@show',$event->id)}}" class="btn btn-primary btn-sm">Mostrar</a>
						</td>
						<td>
							<a href="{{URL::action('EventController@getEditions',$event->id)}}" class="btn btn-primary btn-sm">Ediciones</a>
						</td>
						<td> 
							<a href="{{URL::action('EventController@edit',$event->id)}}" class="btn btn-primary btn-sm">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger btn-sm" data-target="#modal-delete-{{$event->id}}" data-toggle="modal">Eliminar</a>
						</td>
					</tr>
					@include('event.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection