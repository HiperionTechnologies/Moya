@extends('layouts.app')
@section('content')

<a href="{{url('event')}}" class="btn btn-danger">Regresar</a>

<h2> Galeria del Evento - {{$event->name}} <a href="{{URL::action('GalleryController@create',$event->id)}}" class="btn btn-primary">Agregar Imagenes</a></h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead class="table-dark">
				<tr align="center">
					<th>IMAGEN</th>
					<th colspan="2">OPCIONES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($event->gallery as $image)
					<tr align="center">
						<td> 
							<img src="{{$path.$image->route}}" width="250" height="250"> 
						</td>
						<td> 
							<a href="{{URL::action('GalleryController@edit',[$event->id,$image->id])}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$event->id}}-{{$image->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('gallery.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection