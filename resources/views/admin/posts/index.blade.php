@extends('templates/index')

@section('title')
	Listando posts
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Blog Admin</h1>

				<a href="{{ route('admin.posts.create') }}" class="btn btn-success">Novo Post</a><br><br>

				<table class="table">
					<tr>
						<th>ID</th>
						<th>Título</th>
						<th>Ação</th>
					</tr>
					@foreach($posts as $post)
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->title }}</td>
							<td>
								<a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="btn btn-default">Editar</a>
								<a href="{{ route('admin.posts.delete', ['id' => $post->id]) }}" class="btn btn-danger">Remover</a>
							</th>
						</tr>
					@endforeach
				</table>
				{!! $posts->render() !!}
			</div>
		</div>
	</div>
@endsection