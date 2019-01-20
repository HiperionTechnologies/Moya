@extends('layouts.front')
@section('content')

<h2>Nueva Convocatoria</h2>
<div>
	{!!Form::open(['route'=>['convocatoria.store',$sede],'method'=>'POST','enctype'=>'multipart/form-data','id'=>'announcement-form'])!!}
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('first_name','Nombre',['class'=>'control-label'])!!}
				{!!Form::text('first_name',null,['class'=>'form-control','placeholder'=>'Nombre','id'=>'first_name'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('last_name','Apellidos',['class'=>'control-label'])!!}
				{!!Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Apeliidos'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('phone','Telefono',['class'=>'control-label'])!!}
				{!!Form::text('phone',null,['class'=>'form-control','placeholder'=>'Telefono'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('brand','Marca',['class'=>'control-label'])!!}
				{!!Form::text('brand',null,['class'=>'form-control','placeholder'=>'Marca'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="social">
			<div class="form-group" id="dynamic">
				{!!Form::label('social','Redes Sociales',['class'=>'control-label'])!!}
				{!!Form::text('social',null,['class'=>'form-control','placeholder'=>'Link de su Red Social'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<input type="button" id="add" value="Agregar Red Social" class="btn btn-primary">
			<input type="button" id="del" value="Eliminar Ultima Red Social" class="btn btn-danger">
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('description','Descripcion de marca',['class'=>'control-label'])!!}
				{!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Descripcion de la marca'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('image','Imagen Representativa',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="image" id="image"/>
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('answer_moya','¿Por que crees que tu negocio entra en Moya?',['class'=>'control-label'])!!}
				{!!Form::textarea('answer_moya',null,['class'=>'form-control','placeholder'=>'¿Por que crees que tu negocio entra en Moya?'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
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
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
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
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
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
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
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
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('idCategory','Categoria',['class'=>'control-label'])!!}
				{!!Form::select('idCategory',$categories,null,['class'=>'form-control','placeholder'=>'Seleccione una categoria'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('photo','Fotos',['class'=>'control-label'])!!}
				<input type="file" class="form-control" name="photos[]" id="photos" onChange="validateImages()" multiple />
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('name_interested','¿Conoces a alguien que le pueda interesar entrar en Moya?',['class'=>'control-label'])!!}
				{!!Form::text('name_interested',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('phone_interested','Telefono',['class'=>'control-label'])!!}
				{!!Form::text('phone_interested',null,['class'=>'form-control','placeholder'=>'Telefono'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::label('email_interested','Email',['class'=>'control-label'])!!}
				{!!Form::email('email_interested',null,['class'=>'form-control','placeholder'=>'Email'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="social_int">
			<div class="form-group" id="dynamic_int">
				{!!Form::label('social_interested','Redes Sociales',['class'=>'control-label'])!!}
				{!!Form::text('social_interested',null,['class'=>'form-control','placeholder'=>'Link de su Red Social'])!!}
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<input type="button" id="add_int" value="Agregar Red Social" class="btn btn-primary">
			<input type="button" id="del_int" value="Eliminar Ultima Red Social" class="btn btn-danger">
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="form-group">
				{!!Form::submit('Enviar',['class'=>'btn btn-primary','id'=>'form_submit'])!!}
			</div>
		</div>
	{!!Form::close()!!}
</div>

<script>
	$(document).ready(function(){
		$('#del').attr('disabled','disabled');
		$('#add').click(function(){
			var padre = document.getElementById("social");
			var totalSocial = padre.childElementCount + 1;

			var div = document.createElement('div');
			div.setAttribute("class","form-group");
			div.setAttribute("id","dynamic"+totalSocial);
			padre.appendChild(div);

			var input = document.createElement('input');
			input.setAttribute("type",'text');
			input.setAttribute("id","social"+totalSocial);
			input.setAttribute("name","social"+totalSocial);
			input.setAttribute("class","form-control");
			input.setAttribute("placeholder","Link de su Red Social");
			div.appendChild(input);

			$('#del').attr('disabled',false);
			if(totalSocial == 5){
				$('#add').attr('disabled','disabled');
			}
			totalSocial+=1;
		});

		$('#del').click(function(){
			var padre = document.getElementById("social");
			var totalSocial = padre.childElementCount;
			var ultimo = document.getElementById("dynamic"+totalSocial);
			padre.removeChild(ultimo);
			$('#add').attr('disabled',false);

			if(totalSocial -1 == 1){
				$('#del').attr('disabled','disabled');
			}
		});

		$('#del_int').attr('disabled','disabled');
		$('#add_int').click(function(){
			var padre = document.getElementById("social_int");
			var totalSocial = padre.childElementCount + 1;

			var div = document.createElement('div');
			div.setAttribute("class","form-group");
			div.setAttribute("id","dynamic_int"+totalSocial);
			padre.appendChild(div);

			var input = document.createElement('input');
			input.setAttribute("type",'text');
			input.setAttribute("id","social_interested"+totalSocial);
			input.setAttribute("name","social_interested"+totalSocial);
			input.setAttribute("class","form-control");
			input.setAttribute("placeholder","Link de su Red Social");
			div.appendChild(input);

			$('#del_int').attr('disabled',false);
			if(totalSocial == 5){
				$('#add_int').attr('disabled','disabled');
			}
			totalSocial+=1;
		});

		$('#del_int').click(function(){
			var padre = document.getElementById("social_int");
			var totalSocial = padre.childElementCount;
			var ultimo = document.getElementById("dynamic_int"+totalSocial);
			padre.removeChild(ultimo);
			$('#add_int').attr('disabled',false);

			if(totalSocial -1 == 1){
				$('#del_int').attr('disabled','disabled');
			}
		});
	});

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