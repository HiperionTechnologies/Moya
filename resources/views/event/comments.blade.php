@extends('layouts.app')
@section('content')

<a href="{{url('event')}}" class="btn btn-danger">Regresar</a>

<h2> Comentarios - {{$event->name}} </h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>COMENTARIO</th>
				</tr>
			</thead>
			<tbody>
				@foreach($comments as $comment)
					<tr>
						<td> {{$comment->id}} </td>
						<td> {{$comment->comment}} </td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$event->id}}-{{$comment->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('comment.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection