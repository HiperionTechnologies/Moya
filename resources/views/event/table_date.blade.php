<table class="table table-bordered table-hover table-sm">
	<thead class="table-dark">
		<tr>
			<th colspan="2"> Fecha </th>
		</tr>
	</thead>
	<tbody>	
		<tr>
			<td> 
				{{$date->date}} 
			</td>
			<td align="right">
				<a href="{{URL::action('DateController@edit',[$event->id,$date->id])}}" class="btn btn-primary btn-sm">Editar</a>
				<a href="" class="btn btn-danger btn-sm" data-target="#modal-delete-{{$event->id}}-{{$date->id}}" data-toggle="modal">Eliminar</a>
			</td>
		</tr>
	</tbody>
</table>

