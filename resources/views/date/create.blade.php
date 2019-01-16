@extends('layouts.app')
@section('content')

<h2>Nueva Fecha - {{$event->name}}</h2>
<div>
	{!!Form::open(['route'=>['date.store',$event->id],'method'=>'POST','id'=>'date-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="dates">
			<div class="form-group" id="dynamic">
				{!!Form::label('date','Fecha',['class'=>'control-label'])!!}
				{!!Form::date('date',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una fecha del evento'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				<input type="button" id="add" value="Agregar Fecha" class="btn btn-primary">
				<input type="button" id="del" value="Eliminar Ultima Fecha" class="btn btn-danger">
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
			var padre = document.getElementById("dates");
			var total = padre.childElementCount + 1;

			//Input date
			var div = document.createElement('div');
			div.setAttribute("class","form-group");
			div.setAttribute("id","dynamic"+total);
			padre.appendChild(div);

			var label = document.createElement('label');
			label.setAttribute("class",'control-label');
			label.innerHTML = "Fecha "+total;
			div.appendChild(label);

			var input = document.createElement('input');
			input.setAttribute("type",'date');
			input.setAttribute("id","date"+total);
			input.setAttribute("name","date"+total);
			input.setAttribute("class","form-control");
			input.setAttribute("placeholder","Seleccione una fecha del evento");
			div.appendChild(input);

			$('#del').attr('disabled',false);
			if(total == 10){
				$('#add').attr('disabled','disabled');
			}
			total+=1;
		});

		$('#del').click(function(){
			var padre = document.getElementById("dates");
			var total = padre.childElementCount;
			var ultimo = document.getElementById("dynamic"+total);
			document.getElementById("dates").removeChild(ultimo);
			$('#add').attr('disabled',false);

			if(total -1 == 1){
				$('#del').attr('disabled','disabled');
			}
		});
	});
</script>

{!! JsValidator::formRequest('App\Http\Requests\DateFormRequest','#date-form') !!}
@endsection