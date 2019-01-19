@extends('layouts.app')
@section('content')

<h2>Editar Ubicacion - {{$ubication->name}}</h2>
<h5>
	NOTA: Si edita un dato de la ubicacion es necesario dar click en el boton "Encontrar Ubicacion"
	para que tambien se actualicen las coordenadas en el mapa
</h5>
<div>
	{!!Form::model($ubication,['route'=>['ubication.update',$ubication->id],'method'=>'PATCH','id'=>'ubication-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('name','Nombre de Identificación',['class'=>'control-label'])!!}
				{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de identificación'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('street','Calle',['class'=>'control-label'])!!}
				{!!Form::text('street',null,['class'=>'form-control','id'=>'street','placeholder'=>'Calle'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('number','Numero',['class'=>'control-label'])!!}
				{!!Form::number('number',null,['class'=>'form-control','id'=>'number','placeholder'=>'Numero'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('colony','Colonia',['class'=>'control-label'])!!}
				{!!Form::text('colony',null,['class'=>'form-control','id'=>'colony','placeholder'=>'Colonia'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('idSede','Sede',['class'=>'control-label'])!!}
				{!!Form::select('idSede',$sedes,null,['class'=>'form-control','id'=>'sede','placeholder'=>'Seleccione una sede'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('latitude','Latitud',['class'=>'control-label'])!!}
				{!!Form::text('latitude',null,['class'=>'form-control','id'=>'latitude','placeholder'=>'Latitud en el mapa', 'readOnly'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('longitude','Longitud',['class'=>'control-label'])!!}
				{!!Form::text('longitude',null,['class'=>'form-control','id'=>'longitude','placeholder'=>'Longitud en el mapa', 'readOnly'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{url('ubication')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	{!!Form::close()!!}
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" onclick="ubication()"> Encontrar Ubicacion </button>	
		</div>
	</div>
</div>

<script type="text/javascript">
	function ubication(){
		var street = document.getElementById('street').value;  //value
		var number = document.getElementById('number').value;
		var colony = document.getElementById('colony').value;  //value
		var sede = document.getElementById('sede');
		var input = sede.options[sede.selectedIndex].innerHTML;  //innerHTML
		var latitude = document.getElementById('latitude');
		var longitude = document.getElementById('longitude');

		var street_words = street.split(" ");
		var colony_words = colony.split(" ");
		var input_words = input.split(" ");

		var address = "";
		for (var i=0; i < street_words.length; i++){
			address += street_words[i]+"+";
		}

		address += number+"+";

		for (var i=0; i < colony_words.length; i++){
			address += colony_words[i]+"+";
		}

		for (var i=0; i < input_words.length; i++){
			if(input_words.length-1 == i)	
				address += input_words[i];
			else
				address += input_words[i]+"+";
		}

		var url = "https://maps.google.com/maps/api/geocode/json?address="+address+"&key=AIzaSyAAcqyyHgV19Yt0QmbAwP5EnadRydt4N7A";
		console.log(url);

		$.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function(result) {
            	console.log(result);
                latitude.value = result.results[0].geometry.location.lat;
                longitude.value = result.results[0].geometry.location.lng;
            },
            error: function (xhr, thrownError) {
                console.log('Algo salio mal'+xhr.responseText);
            } 
        });
	}

</script>

{!! JsValidator::formRequest('App\Http\Requests\UbicationEditFormRequest','#ubication-form') !!}
@endsection