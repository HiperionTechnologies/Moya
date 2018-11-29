<div class="modal fade" role="dialog" tabindex="-1" data-backdrop="false" id="modal-delete-{{$event->id}}-{{$date->id}}-{{$schedule->id}}-{{$itinerary->id}}">
	{!! Form::open(['route'=>['itinerary.destroy', $event->id, $date->id, $schedule->id, $itinerary->id],'method'=>'delete']) !!}
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true"></span>
					</button>
					<h4 class="modal-tiitle">Eliminar: {{$itinerary->itinerary}} - {{$schedule->time}} - {{$date->date}} de {{$event->name}} ? </h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea eliminar</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			{!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
				</div>
			</div>
		</div>
	{!! Form::close() !!}
</div>