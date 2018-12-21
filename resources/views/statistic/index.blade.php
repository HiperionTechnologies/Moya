@extends('layouts.app')
@section('content')

<h2> Estadisticas
	<a href="statistic/create" class="btn btn-primary">Nueva Estadistica</a>
</h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>DESCRIPTION</th>
				</tr>
			</thead>
			<tbody>
				@foreach($statistics as $statistic)
					<tr>
						<td> {{$statistic->id}} </td>
						<td> {{$statistic->name}} </td>
						<td> {{$statistic->description}} </td>
						<td> 
							<a href="{{URL::action('StatisticController@getImages',$statistic->id)}}" class="btn btn-primary">Imagenes</a>
						</td>
						<td> 
							<a href="{{URL::action('StatisticController@edit',$statistic->id)}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$statistic->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('statistic.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection