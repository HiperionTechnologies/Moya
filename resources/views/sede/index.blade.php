@extends('layouts.app')
@section('content')

<h2> Sedes 
	<a href="sede/create" class="btn btn-primary">Nuevo Sede</a>
</h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>CITY</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sedes as $sede)
					<tr>
						<td> {{$sede->id}} </td>
						<td> {{$sede->city}} </td>
						<td> 
							<a href="{{URL::action('SedeController@edit',$sede->id)}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$sede->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('sede.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection