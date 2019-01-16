@extends('layouts.app')
@section('content')

<h2>Nuevo Itinerario - {{$schedule->time}} - {{$date->date}} - {{$event->name}}</h2>
<div>
	{!!Form::open(['route'=>['itinerary.store',$event->id,$date->id,$schedule->id],'method'=>'POST','id'=>'itinerary-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="itinerary">
			<div id="dynamic">
				<div class="form-group">
					{!!Form::label('time','Hora',['class'=>'control-label'])!!}
					{!!Form::text('time',null,['class'=>'form-control','placeholder'=>'Hora del itinerario'])!!}
				</div>
				<div class="form-group">
					{!!Form::label('itinerary','Itinerario',['class'=>'control-label'])!!}
					{!!Form::text('itinerary',null,['class'=>'form-control','placeholder'=>'Escriba el itinerario'])!!}
				</div>
			</div>
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
			div.setAttribute("id","dynamic"+total);
			document.getElementById("itinerary").appendChild(div);

			//Input time
			var divinp = document.createElement('div');
			divinp.setAttribute("class","form-group");
			div.appendChild(divinp);

			var label = document.createElement('label');
			label.setAttribute("class",'control-label');
			label.innerHTML = "Hora "+total;
			divinp.appendChild(label);

			var input = document.createElement('input');
			input.setAttribute("type",'text');
			input.setAttribute("id","time"+total);
			input.setAttribute("name","time"+total);
			input.setAttribute("class","form-control");
			input.setAttribute("placeholder","Hora del itinerario");
			divinp.appendChild(input);

			//Input itinerary
			var divinp = document.createElement('div');
			divinp.setAttribute("class","form-group");
			div.appendChild(divinp);

			var label = document.createElement('label');
			label.setAttribute("class",'control-label');
			label.innerHTML = "Itinerario "+total;
			divinp.appendChild(label);

			var input = document.createElement('input');
			input.setAttribute("type",'text');
			input.setAttribute("id","itinerary"+total);
			input.setAttribute("name","itinerary"+total);
			input.setAttribute("class","form-control");
			input.setAttribute("placeholder","Escriba el itinerario");
			divinp.appendChild(input);

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

			if(total -1 == 1){
				$('#del').attr('disabled','disabled');
			}
		});
	});
</script>

{!! JsValidator::formRequest('App\Http\Requests\ItineraryFormRequest','#itinerary-form') !!}
@endsection