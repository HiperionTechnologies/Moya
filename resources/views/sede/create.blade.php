@extends('layouts.app')
@section('content')

<h2>Nuevo Sede</h2>
<div>
	{!!Form::open(['route'=>'sede.store','method'=>'POST','id'=>'sede-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="tel">
			<div class="form-group">
				{!!Form::label('city','Ciudad',['class'=>'control-label'])!!}
				{!!Form::text('city',null,['class'=>'form-control','placeholder'=>'Ciudad'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{url('sede')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	{!!Form::close()!!}
</div>

{!! JsValidator::formRequest('App\Http\Requests\SedeFormRequest','#sede-form') !!}
@endsection