@extends('layouts.app')

@section('title')
    {{ $project->title }}
@endsection

@section('content')
  <div class="container">
   <div class="d-flex gap-3">
      <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>
      <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary mt-4 mb-3">Modifica</a>
      <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-4 mb-3" data-bs-toggle="modal"data-bs-target="#delete-project-{{ $project->id }}">Elimina</button>
      </form>
   </div>
    
   <div class="row">
      <div class="col-6">
        <div class="card  mx-auto text-center">
          <div class="card-header mb-3"> 
            <h1 class="mt-3 fw-bold">{{ $project->title }}</h1>
          </div>
          <span class="d-inline-block fw-bold fs-5">Created By:</span><code class="d-inline-block fs-5">{{ $project->author }}</code>
    
          <span class="mt-3 fs-5 fw-bold d-block">Description:</span>
          <p>{{ $project->description }}</p>
    
          <span class="mt-3 fs-5 fw-bold d-block">Technologies:</span>
          @foreach ($technologies as $technology)
            <span>{{ $technology->label }}</span>
          @endforeach
    
          <span class="mt-3 fs-5 fw-bold">Link project:</span>
          <a href="{{ $project->project_link }}" target="_blank"><i class="mb-4 fa-xl fa-brands fa-square-github"></i></i></a>
        </div>
      </div>
      <div class="col-6">
        <div class="card  mx-auto text-center">
          
          @if(!empty($project->image))
          <img src="{{asset('storage/' . $project->image)}}" class="card-img-top" alt="project image">
          @endif
          <div class="card-header mb-3"> 
            <h1 class="mt-3 fw-bold">{{ $project->title }}</h1>
          </div>
          
        </div>
      </div>

   </div>
    

    
  </div>
  
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection