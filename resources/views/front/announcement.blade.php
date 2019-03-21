@extends('layouts.front')
@section('content')

<div class="m-announcement js-block-watch">
	<div class="m-announcement-title">
		<h2 class="m-title-block">Nueva Convocatoria</h2>
		<p>Si estas interesado en participar en MOYA – Mercado Orgánico Y de Artesanías como expositor, compártenos tus datos y nos pondremos en contacto contigo.</p>
		<p>Los campos marcados con * son obligatorios.</p>
	</div>
	{!!Form::open(['route'=>['convocatoria.store',$sede],'method'=>'POST','enctype'=>'multipart/form-data','id'=>'announcement-form', 'class'=>'m-announcement-form'])!!}
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('first_name','Nombre*',['class'=>'control-label'])!!}
				{!!Form::text('first_name',null,['class'=>'form-control','placeholder'=>'Nombre','id'=>'first_name'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('last_name','Apellidos*',['class'=>'control-label'])!!}
				{!!Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Apeliidos'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('phone','Telefono*',['class'=>'control-label'])!!}
				{!!Form::text('phone',null,['class'=>'form-control','placeholder'=>'Telefono'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('brand','Marca*',['class'=>'control-label'])!!}
				{!!Form::text('brand',null,['class'=>'form-control','placeholder'=>'Marca'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group" id="social">
			<div class="form-group" id="dynamic">
				{!!Form::label('social','Facebook',['class'=>'control-label'])!!}
				{!!Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Link de Facebook'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group" id="social">
			<div class="form-group" id="dynamic">
				{!!Form::label('social','Instagram',['class'=>'control-label'])!!}
				{!!Form::text('instagram',null,['class'=>'form-control','placeholder'=>'Link de Instagram'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group" id="social">
			<div class="form-group" id="dynamic">
				{!!Form::label('social','Twitter',['class'=>'control-label'])!!}
				{!!Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Link de Twitter'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('image','Imagen Representativa de tu marca*',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="image" id="image"/>
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('description','Descripcion de marca*',['class'=>'control-label'])!!}
				{!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Cuéntanos un poco de tu marca'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('answer_moya','¿Por que crees que tu negocio entra en Moya?*',['class'=>'control-label'])!!}
				{!!Form::textarea('answer_moya',null,['class'=>'form-control','placeholder'=>'¿Por que crees que tu negocio entra en Moya?'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('organico','¿Los productos estan hechos con material orgánico?',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('organic', 'Si',['class'=>'form-control'])!!}
				{!!Form::label('si','Si',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('organic', 'No',['class'=>'form-control'])!!}
				{!!Form::label('no','No',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('organic', 'No aplica',['class'=>'form-control'])!!}
				{!!Form::label('no-aplica','No aplica',['class'=>'control-label'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('local','¿Los productos se hacen localmente?',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('local', 'Si',['class'=>'form-control'])!!}
				{!!Form::label('si','Si',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('local', 'No',['class'=>'form-control'])!!}
				{!!Form::label('no','No',['class'=>'control-label'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('artesanal','¿Los productos son artesanales?',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('artesanal', 'Si',['class'=>'form-control'])!!}
				{!!Form::label('si','Si',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('artesanal', 'No',['class'=>'form-control'])!!}
				{!!Form::label('no','No',['class'=>'control-label'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('furniture','¿Necesita de mobiliario especial para su stand?',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('furniture', 'Si',['class'=>'form-control'])!!}
				{!!Form::label('si','Si',['class'=>'control-label'])!!}
			</div>
			<div class="form-group">
				{!!Form::radio('furniture', 'No',['class'=>'form-control'])!!}
				{!!Form::label('no','No',['class'=>'control-label'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('idCategory','Categoria*',['class'=>'control-label'])!!}
				{!!Form::select('idCategory',$categories,null,['class'=>'form-control m-form-select','placeholder'=>'Seleccione una categoria'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('photo','Fotos',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="photos[]" id="photos" onChange="validateImages()" multiple />
			</div>
		</div>
		<h3 class="m-announcement-subtitle">¿Conoces a alguien que le pueda interesar entrar en Moya?
			<span>(opcional)</span>
		</h3>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('name_interested','Nombre',['class'=>'control-label'])!!}
				{!!Form::text('name_interested',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('phone_interested','Telefono',['class'=>'control-label'])!!}
				{!!Form::text('phone_interested',null,['class'=>'form-control','placeholder'=>'Telefono'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group">
			<div class="form-group">
				{!!Form::label('email_interested','Email',['class'=>'control-label'])!!}
				{!!Form::email('email_interested',null,['class'=>'form-control','placeholder'=>'Email'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group" id="social_int">
			<div class="form-group" id="dynamic_int">
				{!!Form::label('social_interested','Facebook',['class'=>'control-label'])!!}
				{!!Form::text('facebook_interested',null,['class'=>'form-control','placeholder'=>'Link de Facebook'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group" id="social_int">
			<div class="form-group" id="dynamic_int">
				{!!Form::label('social_interested','Instagram',['class'=>'control-label'])!!}
				{!!Form::text('instagram_interested',null,['class'=>'form-control','placeholder'=>'Link de Instagram'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group" id="social_int">
			<div class="form-group" id="dynamic_int">
				{!!Form::label('social_interested','Twitter',['class'=>'control-label'])!!}
				{!!Form::text('twitter_interested',null,['class'=>'form-control','placeholder'=>'Link de Twitter'])!!}
			</div>
		</div>
		<div class="m-announcement-input-group m-announcement-btn">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn m-btn-black','id'=>'form_submit'])!!}
			</div>
		</div>
	{!!Form::close()!!}
</div>


<script>

	function validateImages(){
		var photos = document.getElementById("photos");
		var images = photos.files;
		var extensions = /(.jpg|.jpeg|.png)$/i;
		if(images.length < 4){
			for(var i=0;i<images.length;i++){
			    if(!extensions.exec(images[i].name)){
			        alert('Uno o mas archivos seleccionados no son imagenes');
			        photos.value = '';
			    }
			}
		}
		else{
			alert('Has excedido el numero maximo de imagenes');
			photos.value = '';
		}
	}
</script>

{!! JsValidator::formRequest('App\Http\Requests\AnnouncementFormRequest','#announcement-form') !!}
@endsection