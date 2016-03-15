@extends('templates/index')

@section('title')
	Listando posts
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Editar Post: {{ $post->title }}</h1>
				
				@if($errors->any())
					<ul class="alert alert-danger">
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				@endif

				{!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'put']) !!}

					@include('admin.posts._form')

					<div class="form-group">
						{!! Form::label('tags', 'Tags:') !!}
						{!! Form::textarea('tags', $post->tagList, ['class'=>'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection