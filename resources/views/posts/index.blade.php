@extends('templates/index')

@section('title')
	Listando posts
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				@foreach($posts as $post)
					<h1>{{ $post->title }}</h1>
					<p>{{ $post->content }}</p> 
					<h3>Tags</h3>
					<ul>
						@foreach($post->tags as $tag)			
							<li>{{ $tag->name }}</li>
						@endforeach
					</ul>
					<h3>Comentários</h3>
					@foreach($post->comments as $comment)
						<b>Nome:</b> {{ $comment->name }}<br>
						<b>Comentário: </b> {{ $comment->comment }}
					@endforeach
					<hr>
				@endforeach
			</div>
		</div>
	</div>
@endsection