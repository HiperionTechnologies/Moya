<table class="table table-bordered table-hover table-sm" style='width:70%; margin-left:30%;'>
	<thead class="table-dark">
		<tr>
			<th colspan="3"> Itinerarios </th>
		</tr>
	</thead>
	<tbody>	
		@foreach($schedule->itineraries as $itinerary)
			<tr >
				<td> {{$itinerary->itinerary}} </td> 
				<td> {{$itinerary->time}} </td> 
				<td align="right"> 
					<a href="{{URL::action('ItineraryController@edit',[$event->id,$date->id,$schedule->id,$itinerary->id])}}" class="btn btn-primary btn-sm">Editar</a>
					<a href="" class="btn btn-danger btn-sm" data-target="#modal-delete-{{$event->id}}-{{$date->id}}-{{$schedule->id}}-{{$itinerary->id}}" data-toggle="modal">Eliminar</a>
				</td>
			</tr>
			@include('itinerary.modal')
		@endforeach
	</tbody>
</table>