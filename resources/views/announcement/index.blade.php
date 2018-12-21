@extends('layouts.app')
@section('content')

<h2> Convocatorias </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr style="text-align: center;">
					<th rowspan="2">ID</th>
					<th rowspan="2">NOMBRE</th>
					<th rowspan="2">TELEFONO</th>
					<th rowspan="2">MARCA</th>
					<th rowspan="2">DESCRIPCION</th>
					<th rowspan="2">¿PORQUE CREES QUE 
					TU NEGOCIO VA EN MOYA?</th>
					<th colspan="4">PRODUCTOS</th>
					<th rowspan="2">OPTIONS</th>
					<tr>
						<th>¿ORGANICOS?</th>
						<th>¿LOCALES?</th>
						<th>¿ARTESANALES?</th>
						<th>¿MOBILIARIO?</th>
					</tr>
				</tr>
			</thead>
			<tbody>
				@foreach($announcements as $ann)
					<tr>
						<td> {{$ann->id}} </td>
						<td> {{$ann->first_name}} {{$ann->last_name}} </td>
						<td> {{$ann->phone}} </td>
						<td> {{$ann->brand}} </td>
						<td> {{$ann->description}} </td>
						<td> {{$ann->answer_moya}} </td>
						<td> {{$ann->organic}} </td>
						<td> {{$ann->local}} </td>
						<td> {{$ann->artesanal}} </td>
						<td> {{$ann->furniture}} </td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$ann->id}}" data-toggle="modal">Delete</a>
							<a href="{{URL::action('AnnouncementController@getPhotos',$ann->id)}}" class="btn btn-primary">Fotos</a>
							<a href="{{URL::action('AnnouncementController@getNetworks',$ann->id)}}" class="btn btn-primary">Redes Sociales</a>
						</td>
					</tr>
					@include('announcement.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection