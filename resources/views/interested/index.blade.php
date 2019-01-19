@extends('layouts.app')
@section('content')
	
<h2>Lista de personas que podrian interesarse en entrar en MOYA</h2>

<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead class="table-dark">
				<tr align="center">
					<th>NOMBRE</th>
					<th>TELEFONO</th>
					<th>EMAIL</th>
					<th>REDES SOCIALES</th>
					<th>OPCIONES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($interesteds as $interested)
					<tr align="center">
						<td> {{$interested->name}} </td>
						<td> {{$interested->phone}} </td>
						<td> {{$interested->email}} </td>
						<td>
						@foreach($interested->socialNetworks as $social)
							<a href="{{$social->link}}" target="_blank">{{$social->link}}</a>
						@endforeach
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$interested->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('interested.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection