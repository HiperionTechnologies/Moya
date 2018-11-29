@extends('layouts.app')
@section('content')

<a href="{{url('announcement')}}" class="btn btn-danger">Regresar</a>

<h2> Fotos - {{$announcement->brand}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Foto</th>
				</tr>
			</thead>
			<tbody>
				@foreach($photos as $photo)
					<tr>
						<td> {{$photo->id}} </td>
						<td> 
							<!-- <img src="/{{Storage::disk('public')->url($photo->route)}}"> -->
							<img src="{{$path.$photo->route}}"> 
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection