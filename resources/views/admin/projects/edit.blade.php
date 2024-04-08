@extends('layouts.app')

@section('title')
    {{ $project->title }}
@endsection

@section('content')
  <div class="container">
    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary mt-4 mb-3">Torna al progetto</a>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>

    <h1 class="mb-3">Modifica {{ $project->title }}</h1>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf

        @method('PATCH')

        <div class="row g-3">
            <div class="col-6">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ $errors->any() ? old('title') : $project->title }}">

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-6">
                <label for="author" class="form-label">Autore</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                    name="author" value="{{ $errors->any() ? old('author') : $project->author }}">

                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="project_link" class="form-label">Link al progetto</label>
                <input type="url" class="form-control @error('project_link') is-invalid @enderror" id="project_link"
                    name="project_link" value="{{ $errors->any() ? old('project_link') : $project->project_link }}">

                @error('project_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ $errors->any() ? old('description') : $project->description }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-2">
                <button class="btn btn-success">Salva</button>
            </div>
        </div>
    </form>
  </div>
@endsection



@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection