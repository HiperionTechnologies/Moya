@extends('layouts.app')
@section('content')

<a href="{{url('announcement')}}" class="btn btn-danger">Regresar</a>
<h2> Convocatoria - {{$announcement->first_name}} {{$announcement->last_name}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<div class="container">
			<h4> Datos Personales </h4>
			<p>Nombre: {{$announcement->first_name}} {{$announcement->last_name}} </p>
			<p>Telefono: {{$announcement->phone}} </p>
			<p>Sede: {{$announcement->sede->city}} </p>
			<h6>Redes Sociales</h6>
			<table class="table table-bordered table-hover table-sm">
				<tbody>	
					@foreach($announcement->socialNetworks as $social)
					<tr> 
						<td>
							<a href="{{$social->link}}" target="_blank"> {{$social->link}} </a>
						</td> 
					</tr>
					@endforeach
				</tbody>
			</table>

			<h4>Datos de la Marca</h4>
			<p>Marca: {{$announcement->brand}} </p>
			<p>Descripción: {{$announcement->description}} </p>
			<p>Categoria: {{$announcement->category->name}} </p>
			<p>¿Los productos son orgánicos? : {{$announcement->organic}} </p>
			<p>¿Los productos se crean localmente? : {{$announcement->local}} </p>
			<p>¿Los productos son artesanalaes? : {{$announcement->artesanal}} </p>
			<p>¿Se usará mobiliario especial para el stand? : {{$announcement->furniture}} </p>

			<h4>Respuesta - ¿Porque crees que tu negocio entra en MOYA?</h4>
			<p> {{$announcement->answer_moya}} </p>

			<h4> Imagen representativa </h4>
			<div style="width: 50%; margin-left: 25%;">
				<img src="{{$path.$announcement->image}}" width="100%" height="200" style='margin-bottom:20px;'>
			</div>

			@if(count($announcement->photos) > 0)
				<h4>GALERIA</h4>
				<div style="width: 100%">
				@foreach($announcement->photos as $image)
					<div style="float: left; width: 23%; margin-left: 1%; margin-right: 1%, margin-bottom: 1%">
						<img src="{{$path.$image->route}}" width="100%" height="200" style='margin-bottom: 1%;'>
					</div>
				@endforeach
				</div>
			@endif
		</div>
	</div>
</div>

@endsection