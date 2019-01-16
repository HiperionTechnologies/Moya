@extends('layouts.app')
@section('content')

<h2> Datos de la Página Principal </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>IMAGEN</th>
					<th>UBICACION</th>
					<th>TITULO</th>
					<th>DESCRIPCION</th>
					<th>OPCIONES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($images as $image)
					<tr>
						<td> <img src="{{$path.$image->route}}" width="300" height="200"> </td> 
						<td> {{$image->name}}</td>
						<td> {{$image->title}} </td>
						<td> {{$image->description}} </td>
						<td> 
							<a href="{{URL::action('PrincipalPageController@edit',$image->id)}}" class="btn btn-primary">Editar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection