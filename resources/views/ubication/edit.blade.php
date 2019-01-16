@extends('layouts.app')
@section('content')

<h2>Nuevo Sede</h2>
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
				{!!Form::text('street',null,['class'=>'form-control','placeholder'=>'Calle'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('number','Numero',['class'=>'control-label'])!!}
				{!!Form::number('number',null,['class'=>'form-control','placeholder'=>'Numero'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('colony','Colonia',['class'=>'control-label'])!!}
				{!!Form::text('colony',null,['class'=>'form-control','placeholder'=>'Colonia'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('idSede','Sede',['class'=>'control-label'])!!}
				{!!Form::select('idSede',$sedes,null,['class'=>'form-control','placeholder'=>'Seleccione una sede'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{url('ubication')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	{!!Form::close()!!}
</div>

{!! JsValidator::formRequest('App\Http\Requests\UbicationFormRequest','#ubication-form') !!}
@endsection