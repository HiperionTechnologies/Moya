@extends('layouts.app')
@section('content')

<h2> Categorias 
	<a href="category/create" class="btn btn-primary">Nueva Categoria</a>
</h2>
<div class="row">
	<div class="col-lg-12 table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>NAME</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
						<td> {{$category->id}} </td>
						<td> {{$category->name}} </td>
						<td> 
							<a href="{{URL::action('CategoryController@edit',$category->id)}}" class="btn btn-primary">Editar</a>
						</td>
						<td>
							<a href="" class="btn btn-danger" data-target="#modal-delete-{{$category->id}}" data-toggle="modal">Delete</a>
						</td>
					</tr>
					@include('category.modal')
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection