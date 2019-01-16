@extends('layouts.app')
@section('content')

<h2> Ubicaciones  
	<a href="ubication/create" class="btn btn-primary">Nueva Ubicacion</a>
</h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>CALLE</th>
					<th>NUMERO</th>
					<th>COLONIA</th>
					<th>SEDE</th>
					<th>OPTIONS</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ubications as $ubication)
					<tr>
						<td> {{$ubication->id}} </td>
						<td> {{$ubication->name}} </td>
						<td> {{$ubication->street}} </td>
						<td> {{$ubication->number}} </td>
						<td> {{$ubication->colony}} </td>
						<td> {{$ubication->sede->city}} </td>
						<td> 
							<a href="{{URL::action('UbicationController@edit',$ubication->id)}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$ubication->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('ubication.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection