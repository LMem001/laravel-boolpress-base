@extends('layouts.base')

@section('pageTitle')
	Crea un nuovo post
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('POST')
	<div class="form-group">
		<label for="title">Titolo</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Title">
	</div>
	<div class="form-group">
		<label for="date">Data</label>
		<input type="date" class="form-control" id="date" name="date" placeholder="Date">
	</div>
	<div class="form-group">
		<label for="content">Contenuto</label>
		<textarea class="form-control"  name="content" id="content" cols="30" rows="10" placeholder="content"></textarea>
	</div>
	<div class="form-group">
		<label for="image">Immagine</label>
		<input type="file" id="image" name="image">
	</div>
	<div class="form-check form-check-inline">
		<input class="form-check-input" type="checkbox" id="published" name="published">
		<label class="form-check-label" for="published">Pubblicato</label>
	</div>
	<div class="mt-3">
		<h3>Tags</h3>
		@foreach ($tags as $tag)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]">
				<label class="form-check-label" for="{{$tag->name}}">
					{{$tag->name}}
				</label>
			</div>
		@endforeach
	</div>
	<div class="mt-3">
		<button type="submit" class="btn btn-primary">Crea</button>
	</div>
</form>
	
@endsection