@extends('layouts.app')
@section('content')

<h2>Editar Sede - {{$sede->city}} </h2>
<h2> {{$date}} </h2>
<div>
	{!!Form::model($sede,['route'=>['sede.update',$sede->id],'method'=>'PATCH','id'=>'sede-form'])!!}
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