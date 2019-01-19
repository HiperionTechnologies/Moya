@extends('layouts.app')
@section('content')

<h2> Estadisticas  <a href="{{URL::action('StatisticController@edit',$statistics->id)}}" class="btn btn-primary">Editar</a> </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead class="table-dark">
				<tr align="center">
					<th>ESTADISTICA</th>
					<th>DESCRIPCION</th>
				</tr>
			</thead>
			<tbody>
				<tr align="center">
					<td> Ediciones </td>
					<td> {{$statistics->editions}} </td>
				</tr>
				<tr align="center">
					<td> Marcas </td>
					<td> {{$statistics->brands}} </td>
				</tr>
				<tr align="center">
					<td> Clientes </td>
					<td> {{$statistics->customers}} </td>
				</tr>
				<tr align="center">
					<td> Ventas </td>
					<td> {{$statistics->sales}} </td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection