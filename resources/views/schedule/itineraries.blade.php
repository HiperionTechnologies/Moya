@extends('layouts.app')
@section('content')

<a href="{{URL::action('DateController@getSchedules',[$event->id,$date->id])}}" class="btn btn-danger">Regresar</a>

<h2> Itinerarios - {{$schedule->time}} - {{$date->date}} - {{$event->name}} <a href="{{URL::action('ItineraryController@create',[$event->id,$date->id,$schedule->id])}}" class="btn btn-primary">Nuevo Itinerario</a></h2>

<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>HORA</th>
					<th>ITINERARIO</th>
				</tr>
			</thead>
			<tbody>
				@foreach($itineraries as $itinerary)
					<tr>
						<td> {{$itinerary->id}} </td>
						<td> {{$itinerary->time}} </td>
						<td> {{$itinerary->itinerary}} </td>
						<td> 
							<a href="{{URL::action('ItineraryController@edit',[$event->id,$date->id,$schedule->id,$itinerary->id])}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$event->id}}-{{$date->id}}-{{$schedule->id}}-{{$itinerary->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('itinerary.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection