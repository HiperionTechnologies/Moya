@extends('layouts.app')
@section('content')

<h2>Editar imagen - {{$edition->name}} - {{$event->name}}</h2>
<div>
	{!!Form::model($gallery,['route'=>['e-gallery.update',$event->id,$edition->id,$gallery->id],'method'=>'PATCH','enctype'=>'multipart/form-data','id'=>'gallery-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('gallery','Galeria',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="gallery"/>
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
				<a href="{{URL::action('EditionController@show',[$event->id,$edition->id])}}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	{!!Form::close()!!}
</div>

{!! JsValidator::formRequest('App\Http\Requests\GalleryFormRequest','#gallery-form') !!}
@endsection