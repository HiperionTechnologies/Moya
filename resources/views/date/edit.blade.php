@extends('layouts.app')
@section('content')

<h2>Editar Fecha - {{$event->name}}</h2>
<div>
	{!!Form::model($date,['route'=>['date.update',$event->id,$date->id],'method'=>'PATCH','id'=>'date-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="tel">
			<div class="form-group">
				{!!Form::label('date','Fecha',['class'=>'control-label'])!!}
				{!!Form::date('date',null,['class'=>'form-control','placeholder'=>'Seleccione una fecha del evento'])!!}
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

{!! JsValidator::formRequest('App\Http\Requests\DateFormRequest','#date-form') !!}
@endsection