@extends('layouts.front')
@section('content')

BANNER
<p> Titulo: {{$banner->title}} </p>
<p> Descripcion: {{$banner->description}} </p>
Imagen <img src="{{$path.$banner->route}}">

<h1>MOYA</h1>
<p>MOYA tiene sus inicios en la necesidad social y económica de acercar a los
habitantes de la ciudad de Saltillo una alternativa de productos de la mejor
calidad, creados localmente y sobre todo sustentables.</p>
<p>Teniendo esto en mente, MOYA inició el 22 de abril de 2017 su primer mercado
con una Edición Especial sobre el “Día de la Tierra”</p>
<p>De la mano de Decologist y junto a la iniciativa ciudadana Cómprale a Saltillo se
creó conciencia sobre la problemática ambiental que vivimos hoy en día y sobre
cómo, al promover el comercio local, podemos revertir algunos aspectos de la
misma.</p>
<p>Actualmente MOYA continúa realizando mensualmente ediciones con distintos
expositores locales en uno de los complejos gastronómicos más vanguardistas
de la ciudad de Saltillo y el norte de México, Il Mercato Gentilioni, juntos crean
un proyecto con mayor impacto y valor social.</p>
<p>MOYA es hoy un referente local de calidad, talento y sustentabilidad, tangibles
en cada aspecto de esta iniciativa y con el entero apoyo del gobierno de la
ciudad de Saltillo.</p>

<h1>Estadisticas</h1>
<h4>Sedes:</h4>
@foreach($sedes as $sede)
	<p>
	@if(count($sedes) > 1)
		{{count($sedes)}} sedes
	@else
		{{count($sedes)}} sede
	@endif
	</p>
	->{{$sede->city}}:
	@foreach($sede->ubications as $key => $ubication)
		{{$ubication->street}}
		@if($key < count($sedes))
			, 
		@endif
	@endforeach
@endforeach
<h4>MOYA ha realizado:</h4>
<p>- {{$statistics->editions}}</p>
<h4>A lo largo de todas nuestras ediciones hemos tenido:</h4>
<p>- {{$statistics->brands}}</p>
<h4>Hemos atendido a mas de:</h4>
<p>- {{$statistics->customers}}</p>
<h4>Y hemos logrado un volumen de ventas de:</h4>
<p>- {{$statistics->sales}} </p>
@endsection
