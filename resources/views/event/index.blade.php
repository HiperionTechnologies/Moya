@extends('layouts.app')
@section('content')

<h2> Eventos 
	<a href="event/create" class="btn btn-primary">Nuevo Evento</a>
</h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<div class="container">
			
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>DESCRIPTION</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
					<tr>
						<td> {{$event->id}} </td>
						<td> {{$event->name}} </td>
						<td> {{$event->description}} </td>
						<td> 
							<a href="{{URL::action('EventController@edit',$event->id)}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$event->id}}" data-toggle="modal">Delete</a>
						</td>
						<td>
							<a href="{{URL::action('EventController@getDates',$event->id)}}" class="btn btn-primary">Fechas</a>

							<a href="{{URL::action('EventController@getGallery',$event->id)}}" class="btn btn-primary">Galeria</a>

							<a href="{{URL::action('EventController@getUbication',$event->id)}}" class="btn btn-primary">Ubicacion</a>

							<a href="{{URL::action('EventController@getComments',$event->id)}}" class="btn btn-primary">Comentarios</a>
						</td>
					</tr>
					@include('event.modal')
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>

@endsection