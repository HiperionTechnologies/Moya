@extends('layouts.app')
@section('content')

<a href="{{url('event')}}" class="btn btn-danger">Regresar</a>

<h2> Ubicacion - {{$event->name}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>CALLE</th>
					<th>NUMERO</th>
					<th>COLONIA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td> {{$ubication->id}} </td>
					<td> {{$ubication->street}} </td>
					<td> {{$ubication->number}} </td>
					<td> {{$ubication->colony}} </td>
					<td> 
						<a href="{{URL::action('UbicationController@edit',[$event->id,$ubication->id])}}" class="btn btn-primary">Editar</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection