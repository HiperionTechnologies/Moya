@extends('layouts.app')
@section('content')

<h2>Nuevo Evento</h2>
<div>
	{!!Form::open(['route'=>'event.store','method'=>'POST','enctype'=>'multipart/form-data','id'=>'event-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('name','Nombre',['class'=>'control-label'])!!}
				{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del Evento'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('description','Descripcion',['class'=>'control-label'])!!}
				{!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Descripcion del Evento'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('date','¿Registrar Fechas? (Opcional)',['class'=>'control-label'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="dates">
			
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				<input type="button" id="add" value="Agregar Fecha" class="btn btn-primary">
				<input type="button" id="del" value="Eliminar Ultima Fecha" class="btn btn-danger">
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('image','Imagen Representativa',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="image"/>
			</div>
		</div>
		<!--<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('gallery','Galeria',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="gallery[]" multiple />
			</div>
		</div>-->
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('idUbication','Ubicacion del Evento',['class'=>'control-label'])!!}
				{!!Form::select('idUbication',$ubications,null,['class'=>'form-control','placeholder'=>'Seleccione una ubicacion'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{url('event')}}" class="btn btn-danger">Cancelar</a>
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

			var div = document.createElement('div');
			div.setAttribute("class","form-group");
			div.setAttribute("id","dynamic"+total);
			document.getElementById("dates").appendChild(div);

			//Input date
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

			if(total -1 == 0){
				$('#del').attr('disabled','disabled');
			}
		});
	});
</script>

{!! JsValidator::formRequest('App\Http\Requests\EventFormRequest','#event-form') !!}
@endsection