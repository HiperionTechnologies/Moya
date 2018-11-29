@extends('layouts.app')
@section('content')

<a href="{{url('statistic')}}" class="btn btn-danger">Regresar</a>

<h2> Fotos - {{$statistic->name}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Imagen</th>
				</tr>
			</thead>
			<tbody>
				@foreach($images as $image)
					<tr>
						<td> {{$image->id}} </td>
						<td> 
							<img src="{{$path.$image->route}}"> 
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection