@extends('layouts.app')
@section('content')

<h2>Editar Horario - {{$date->date}} - {{$event->name}}</h2>
<div>
	{!!Form::model($schedule,['route'=>['schedule.update',$event->id,$date->id,$schedule->id],'method'=>'PATCH','id'=>'schedule-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('time','Hora',['class'=>'control-label'])!!}
				{!!Form::text('time',null,['class'=>'form-control','placeholder'=>'Hora del Evento en este dia'])!!}
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

{!! JsValidator::formRequest('App\Http\Requests\ScheduleFormRequest','#schedule-form') !!}
@endsection