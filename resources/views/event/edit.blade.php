@extends('layouts.app')
@section('content')

<h2>Editar Evento - {{$event->name}} </h2>
<div>
	{!!Form::model($event,['route'=>['event.update',$event->id],'method'=>'PATCH','enctype'=>'multipart/form-data','id'=>'event-form'])!!}
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
				{!!Form::label('image','Imagen Representativa',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="image"/>
			</div>
		</div>
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

{!! JsValidator::formRequest('App\Http\Requests\EventEditFormRequest','#event-form') !!}
@endsection