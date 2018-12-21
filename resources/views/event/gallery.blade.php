@extends('layouts.app')
@section('content')

<a href="{{url('event')}}" class="btn btn-danger">Regresar</a>

<h2> Galeria del Evento - {{$event->name}} <a href="{{URL::action('GalleryController@create',$event->id)}}" class="btn btn-primary">Agregar imagen</a></h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>IMAGEN</th>
				</tr>
			</thead>
			<tbody>
				@foreach($gallery as $image)
					<tr>
						<td> {{$image->id}} </td>
						<td> 
							<img src="{{$path.$image->route}}"> 
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