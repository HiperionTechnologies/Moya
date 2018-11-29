@extends('layouts.app')
@section('content')

<a href="{{URL::action('EventController@getDates',$event->id)}}" class="btn btn-danger">Regresar</a>

<h2> Horarios - {{$date->date}} - {{$event->name}} <a href="{{URL::action('ScheduleController@create',[$event->id,$date->id])}}" class="btn btn-primary">Nuevo Horario</a></h2>

<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>HORARIO</th>
				</tr>
			</thead>
			<tbody>
				@foreach($schedules as $schedule)
					<tr>
						<td> {{$schedule->id}} </td>
						<td> {{$schedule->time}} </td>
						<td> 
							<a href="{{URL::action('ScheduleController@edit',[$event->id,$date->id,$schedule->id])}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="{{URL::action('ScheduleController@getItineraries',[$event->id,$date->id,$schedule->id])}}" class="btn btn-primary">Itinerarios</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$event->id}}-{{$date->id}}-{{$schedule->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('schedule.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection