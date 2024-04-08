@extends('layouts.app')

@section('title')
    {{ $project->title }}
@endsection

@section('content')
  <div class="container">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary mt-4 mb-3">Modifica</a>
    <button type="button" class="btn btn-danger mt-4 mb-3" data-bs-toggle="modal"data-bs-target="#delete-project-{{ $project->id }}">Elimina</button>

    <div class="card w-25 mx-auto text-center">
      <div class="card-header mb-3"> 
        <h1 class="mt-3 fw-bold">{{ $project->title }}</h1>
      </div>
      <span class="d-inline-block fw-bold fs-5">Created By:</span><code class="d-inline-block fs-5">{{ $project->author }}</code>

      <span class="mt-3 fs-5 fw-bold d-block">Description:</span>
      <p>{{ $project->description }}</p>

      <span class="mt-3 fs-5 fw-bold">Link project:</span>
      <a href="{{ $project->project_link }}" target="_blank"><i class="mb-4 fa-xl fa-brands fa-square-github"></i></i></a>
    </div>
  </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection