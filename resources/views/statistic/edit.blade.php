@extends('layouts.app')
@section('content')

<h2>Editar Estadisticas</h2>
<div>
	{!!Form::model($statistic,['route'=>['statistic.update',$statistic->id],'method'=>'PATCH','id'=>'statistic-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('editions','Ediciones',['class'=>'control-label'])!!}
				{!!Form::textarea('editions',null,['class'=>'form-control','placeholder'=>'Ediciones'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('brands','Marcas',['class'=>'control-label'])!!}
				{!!Form::textarea('brands',null,['class'=>'form-control','placeholder'=>'Marcas'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('customers','Clientes',['class'=>'control-label'])!!}
				{!!Form::textarea('customers',null,['class'=>'form-control','placeholder'=>'Clientes'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('sales','Ventas',['class'=>'control-label'])!!}
				{!!Form::textarea('sales',null,['class'=>'form-control','placeholder'=>'Ventas'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{url('statistic')}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	{!!Form::close()!!}
</div>

{!! JsValidator::formRequest('App\Http\Requests\StatisticFormRequest','#statistic-form') !!}
@endsection