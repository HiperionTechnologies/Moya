@extends('layouts.app')
@section('content')

<h2> Estadisticas  <a href="{{URL::action('StatisticController@edit',$statistics->id)}}" class="btn btn-primary">Editar</a> </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ESTADISTICA</th>
					<th>DESCRIPCION</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td> Ediciones </td>
					<td> {{$statistics->editions}} </td>
				</tr>
				<tr>
					<td> Marcas </td>
					<td> {{$statistics->brands}} </td>
				</tr>
				<tr>
					<td> Clientes </td>
					<td> {{$statistics->customers}} </td>
				</tr>
				<tr>
					<td> Ventas </td>
					<td> {{$statistics->sales}} </td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection