@extends('layouts.front')
@section('content')

@if($announcement)
<div class="m-success js-block-watch">
	<div class="m-success-title">Registro Completado</div>
	<i class="far fa-check-circle"></i>
	<div class="m-success-content">
		<h2>{{$announcement->first_name}} {{$announcement->last_name}}</h4>
		<p>Los datos de su convocatoria se han enviado exitosamente</p>
		<p>Gracias por su preferencia</p>
		<div class="m-success-sede"> {{$announcement->sede->city}} </div>
		<div class="m-success-date"> {{ date('d-M-y', strtotime($announcement->created_at)) }} </div>
	</div>
</div>
@endif

@endsection