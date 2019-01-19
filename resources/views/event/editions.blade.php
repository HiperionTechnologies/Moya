@extends('layouts.app')
@section('content')

<a href="{{url('event')}}" class="btn btn-danger">Regresar</a>

<h2> Ediciones - {{$event->name}} <a href="{{URL::action('EditionController@create',$event->id)}}" class="btn btn-primary">Nueva Edicion</a></h2>
<div class="row">
	<div class="col-lg-12 table-responsive table-sm">
		<table class="table table-striped table-hover">
			<thead class="table-dark">
				<tr align="center">
					<th>ID</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th colspan="3">OPCIONES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($event->editions as $edition)
					<tr align="center">
						<td> {{$edition->id}} </td>
						<td> {{$edition->name}} </td>
						<td> {{$edition->description}} </td>
						<td> 
							<a href="{{URL::action('EditionController@show',[$event->id,$edition->id])}}" class="btn btn-primary">Mostrar</a>
						</td>
						<td> 
							<a href="{{URL::action('EditionController@edit',[$event->id,$edition->id])}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$event->id}}-{{$edition->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('edition.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection