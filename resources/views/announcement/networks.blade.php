@extends('layouts.app')
@section('content')

<a href="{{url('announcement')}}" class="btn btn-danger">Regresar</a>

<h2> Redes Sociales - {{$announcement->brand}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Red Social</th>
				</tr>
			</thead>
			<tbody>
				@foreach($networks as $network)
					<tr>
						<td> {{$network->id}} </td>
						<td> {{$network->link}} </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection