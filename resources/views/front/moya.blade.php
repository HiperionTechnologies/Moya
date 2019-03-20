@extends('layouts.front')
@section('content')

<div id="m-cover" class="m-cover js-block-watch">
	<div class="m-cover-bg" style="background-image:url({{$path.$banner->route}})"></div>
	<div class="m-cover-info">
		<h1 class="m-title-block">{{$banner->title}}</h1>
		<p>{{$banner->description}}</p>
		<a href="#" class="m-cover-link m-btn-black">
			<div class="m-cover-link-label">
				Explora Edición
			</div>
		</a>
	</div>
	<div class="m-cover-event">Edicion Navideña</div>
</div>
<div class="m-scroll js-block-watch">
	<div class="m-scroll-label">scroll</div>
	<div class="m-scroll-line"></div>
</div>
<div class="m-weare js-block-watch">
	<div class="m-weare-info">
		<h2 class="m-title-block">Acerca de Moya</h2>
		<p> <strong>MOYA</strong> tiene sus inicios en la necesidad social y económica de acercar a los habitantes de la ciudad de Saltillo una alternativa de productos de la mejor calidad, creados localmente y sobre todo sustentables.
			Teniendo esto en mente, <strong>MOYA</strong> inició el 22 de abril de 2017 su primer mercado con una Edición Especial sobre el “Día de la Tierra”
			De la mano de Decologist y junto a la iniciativa ciudadana Cómprale a Saltillo se creó conciencia sobre la problemática ambiental que vivimos hoy en día y sobre cómo, al promover el comercio local, podemos revertir algunos aspectos de la misma.
		</p>
		<p>Actualmente <strong>MOYA</strong> continúa realizando mensualmente ediciones con distintos expositores locales en uno de los complejos gastronómicos más vanguardistas de la ciudad de Saltillo y el norte de México, Il Mercato Gentilioni, juntos crean un proyecto con mayor impacto y valor social.</p>
		<p><strong>MOYA</strong> es hoy un referente local de calidad, talento y sustentabilidad, tangibles en cada aspecto de esta iniciativa y con el entero apoyo del gobierno de la ciudad de Saltillo.</p>
	</div>
</div>
<div class="m-statistics js-block-watch">
	<h2 class="m-statistics-title m-title-block">Nuestros números</h2>
	<div class="m-statistics-container container">
		<div class="m-statistics-box places">
			<div class="m-statistics-icon"><i class="fas fa-map-marked-alt"></i></div>
			@if(count($sedes) > 1)
				<div class="m-statistics-subtitle">Sedes</div>
				<div class="m-statistics-number">{{count($sedes)}}</div>
				@else
				<div class="m-statistics-subtitle">Sede</div>
				<div class="m-statistics-number">{{count($sedes)}}</div>
			@endif
		</div>
		<div class="m-statistics-box editions">
			<div class="m-statistics-icon"><i class="fas fa-handshake"></i></div>
			<div class="m-statistics-subtitle">Ediciones<br/>(desde el 2017)</div>
			<div class="m-statistics-number">{{$statistics->editions}}</div>
		</div>
		<div class="m-statistics-box brands">
			<div class="m-statistics-icon"><i class="far fa-registered"></i></div>
			<div class="m-statistics-subtitle">Marcas</div>
			<div class="m-statistics-number">{{$statistics->brands}}</div>
		</div>
		<div class="m-statistics-box clients">
			<div class="m-statistics-icon"><i class="fas fa-address-book"></i></div>
			<div class="m-statistics-subtitle">Clientes</div>
			<div class="m-statistics-number">{{$statistics->customers}}</div>
		</div>
		<div class="m-statistics-box sales">
			<div class="m-statistics-icon"><i class="fas fa-hand-holding-usd"></i></div>
			<div class="m-statistics-subtitle">Ventas</div>
			<div class="m-statistics-number">{{$statistics->sales}}</div>
		</div>
	</div>
</div>
<div class="m-banner js-block-watch">
	<div class="m-banner-bg" style="background-image:url({{ asset('images/bg_login.jpg') }})"></div>
	<div class="m-banner-bg-shape"></div>
	<div class="m-banner-content">
		<p class="m-banner-text">Forma parte de nuestra comunidad como expositor</p>
		<a href="{{route('convocatoria',[request()->segment(1)])}}" class="m-btn-black">Registrate</a>
	</div>
</div>

@endsection
