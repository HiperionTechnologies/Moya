@extends('layouts.app')
@section('content')

<h2>Editar Edición - {{$edition->name}} - {{$event->name}}</h2>
<div>
	{!!Form::model($edition,['route'=>['edition.update',$event->id,$edition->id],'method'=>'PATCH','id'=>'edition-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('name','Nombre',['class'=>'control-label'])!!}
				{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de la Edicion'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('description','Descripcion',['class'=>'control-label'])!!}
				{!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Descripcion de la Edicion'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{URL::action('EventController@getEditions',$event->id)}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	{!!Form::close()!!}
</div>

{!! JsValidator::formRequest('App\Http\Requests\EditionFormRequest','#edition-form') !!}
@endsection