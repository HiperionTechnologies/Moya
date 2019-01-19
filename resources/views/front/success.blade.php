@extends('layouts.front')
@section('content')

@if($announcement)
<div class="card text-white bg-success mb-3">
  	<div class="card-header">Registro Completado</div>
  	<div class="card-body" align="center">
    	<h4 class="card-title">{{$announcement->first_name}} {{$announcement->last_name}}</h4>
    	<p class="card-text">Los datos de su convocatoria se han enviado exitosamente</p>
    	<p class="card-text">Gracias por su preferencia</p>
    	<p class="card-text" align="right"> {{$announcement->sede->city}} </p>
    	<p class="card-text" align="right"> {{$announcement->created_at}} </p>
  	</div>
</div>
@endif

@endsection