@extends('layouts.app')
@section('content')

<h2>Agregar imagenes - {{$edition->name}} - {{$event->name}}</h2>
<div>
	{!!Form::open(['route'=>['e-gallery.store',$event->id,$edition->id],'method'=>'POST','enctype'=>'multipart/form-data','id'=>'gallery-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('gallery','Galeria',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="gallery[]" id="gallery" onChange="validateImages()" multiple />
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

<script>
	function validateImages(){
		var gallery = document.getElementById("gallery");
		var images = gallery.files;
		var extensions = /(.jpg|.jpeg|.png|.gif)$/i;
		for(var i=0;i<images.length;i++){	
		    if(!extensions.exec(images[i].name)){
		        alert('Uno o mas archivos seleccionados no son imagenes');
		        gallery.value = '';
		    }
		}
	}
</script>

{!! JsValidator::formRequest('App\Http\Requests\GalleryFormRequest','#gallery-form') !!}
@endsection