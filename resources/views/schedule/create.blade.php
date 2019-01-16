@extends('layouts.app')
@section('content')

<h2>Nuevo Horario - {{$date->date}} - {{$event->name}}</h2>
<div>
	{!!Form::open(['route'=>['schedule.store',$event->id,$date->id],'method'=>'POST','id'=>'schedule-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('time','Hora',['class'=>'control-label'])!!}
				{!!Form::text('time',null,['class'=>'form-control','placeholder'=>'Hora del Evento en este dia'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('itineraries','¿Registrar Itinerarios? (Opcional)',['class'=>'control-label'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="itinerary">
			
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				<input type="button" id="add" value="Agregar Itinerario" class="btn btn-primary">
				<input type="button" id="del" value="Eliminar Ultimo Itinerario" class="btn btn-danger">
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{URL::action('EventController@show',[$event->id])}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	{!!Form::close()!!}
</div>

<script>
	$(document).ready(function(){
		$('#del').attr('disabled','disabled');
		$('#add').click(function(){
			var padre = document.getElementById("itinerary");
			var total = padre.childElementCount + 1;

			var div = document.createElement('div');
			div.setAttribute("class","form-group");
			div.setAttribute("id","dynamic"+total);
			document.getElementById("itinerary").appendChild(div);

			//Input time
			var label = document.createElement('label');
			label.setAttribute("class",'control-label');
			label.innerHTML = "Hora "+total;
			div.appendChild(label);

			var input = document.createElement('input');
			input.setAttribute("type",'text');
			input.setAttribute("id","hour"+total);
			input.setAttribute("name","hour"+total);
			input.setAttribute("class","form-control");
			input.setAttribute("placeholder","Hora del itinerario");
			div.appendChild(input);

			//Input itinerary
			var label = document.createElement('label');
			label.setAttribute("class",'control-label');
			label.innerHTML = "Itinerario "+total;
			div.appendChild(label);

			var input = document.createElement('input');
			input.setAttribute("type",'text');
			input.setAttribute("id","itinerary"+total);
			input.setAttribute("name","itinerary"+total);
			input.setAttribute("class","form-control");
			input.setAttribute("placeholder","Escriba el itinerario");
			div.appendChild(input);

			$('#del').attr('disabled',false);
			if(total == 10){
				$('#add').attr('disabled','disabled');
			}
			total+=1;
		});

		$('#del').click(function(){
			var padre = document.getElementById("itinerary");
			var total = padre.childElementCount;
			var ultimo = document.getElementById("dynamic"+total);
			document.getElementById("itinerary").removeChild(ultimo);
			$('#add').attr('disabled',false);

			if(total -1 == 0){
				$('#del').attr('disabled','disabled');
			}
		});
	});
</script>

{!! JsValidator::formRequest('App\Http\Requests\ScheduleFormRequest','#schedule-form') !!}
@endsection