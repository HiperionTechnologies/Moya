@extends('layouts.app')
@section('content')

<a href="{{url('event')}}" class="btn btn-danger">Regresar</a>

<h2> Fechas - {{$event->name}} <a href="{{URL::action('DateController@create',$event->id)}}" class="btn btn-primary">Nueva Fecha</a></h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>FECHA</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dates as $date)
					<tr>
						<td> {{$date->id}} </td>
						<td> {{$date->date}} </td>
						<td> 
							<a href="{{URL::action('DateController@edit',[$event->id,$date->id])}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="{{URL::action('DateController@getSchedules',[$event->id,$date->id])}}" class="btn btn-primary">Horarios</a>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$event->id}}-{{$date->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('date.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection