@extends('layouts.app')
@section('content')

<a href="{{URL::action('EventController@getEditions',$event->id)}}" class="btn btn-danger">Regresar</a>
<h2> Edicion - {{$edition->name}} - {{$event->name}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<div class="container">
			
			<h4> Descripcion </h4>
			<p> {{$edition->description}} </p>

			@if(count($event->gallery) > 0)
				<h4>GALERIA</h4>
				<a href="{{URL::action('EditionGalleryController@create',[$event->id,$edition->id])}}" class="btn btn-primary btn-sm" style='margin-bottom:2px;'>Agregar Imagenes</a>

				<div style="width: 100%">
				@foreach($edition->gallery as $image)
					<div style="float: left; width: 23%; margin-left: 1%; margin-right: 1%, margin-bottom: 1%">
						<img src="{{$path.$image->route}}" width="100%" height="200" style='margin-bottom: 1%;'>
						<a href="{{URL::action('EditionGalleryController@edit',[$event->id,$edition->id,$image->id])}}" class="btn btn-primary btn-sm" style='margin-bottom:5%;'> Editar Imagen</a>
						<a href="" class="btn btn-danger btn-sm" style='margin-bottom:5%;' data-target="#modal-delete-{{$event->id}}-{{$edition->id}}-{{$image->id}}" data-toggle="modal">Eliminar</a>
					</div>
					@include('edition_gallery.modal')
				@endforeach
				</div>
			@endif
		</div>
	</div>
</div>

@endsection