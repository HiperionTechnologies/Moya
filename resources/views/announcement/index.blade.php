@extends('layouts.app')
@section('content')

<h2> Convocatorias </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead class="table-dark"> 
				<tr align="center" ">
					<th>ID</th>
					<th>NOMBRE</th>
					<th>TELEFONO</th>
					<th>MARCA</th>
					<th colspan="2">OPCIONES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($announcements as $ann)
					<tr>
						<td> {{$ann->id}} </td>
						<td> {{$ann->first_name}} {{$ann->last_name}} </td>
						<td> {{$ann->phone}} </td>
						<td> {{$ann->brand}} </td>
						<td>
							<a href="{{URL::action('AnnouncementController@show',$ann->id)}}" class="btn btn-primary">Mostrar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$ann->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('announcement.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection