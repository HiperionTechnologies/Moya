@extends('layouts.app')
@section('content')

<h2>Nuevo Evento</h2>
<div>
	{!!Form::open(['route'=>['gallery.store',$event->id],'method'=>'POST','enctype'=>'multipart/form-data','id'=>'event-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('gallery','Galeria',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="gallery[]" multiple />
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

{!! JsValidator::formRequest('App\Http\Requests\EventFormRequest','#event-form') !!}
@endsection