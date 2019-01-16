<table class="table table-bordered table-hover table-sm" style='width:85%; margin-left:15%;'>
	<thead class="table-dark">
		<tr>
			<th colspan="2"> Horario </th>
		</tr>
	</thead>
	<tbody>	
		<tr>
			<td>
				{{$schedule->time}}
			</td>
			<td align="right">
				<a href="{{URL::action('ScheduleController@edit',[$event->id,$date->id,$schedule->id])}}" class="btn btn-primary btn-sm">Editar</a>
				<a href="" class="btn btn-danger btn-sm" data-target="#modal-delete-{{$event->id}}-{{$date->id}}-{{$schedule->id}}" data-toggle="modal">Eliminar</a>
			</td>
		</tr>
	</tbody>
</table>