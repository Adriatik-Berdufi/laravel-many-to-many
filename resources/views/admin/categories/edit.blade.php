@extends('layouts.app')

@section('title', 'New Project')

@section('content')
<div class="container">
  <a href="{{ route('admin.categories.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>

  <h1 class="mb-3">Add new Category</h1>

  <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PATCH')

      <div class="row g-5">
            <div class="col-4">
                <label for="label-{{$category->id}}" class="form-label">Titolo</label>
                <input class="form-control" type="text" name="label" id="label-{{$category->id}}" value="{{ $category->label }}">
            </div>
            

            <div class="mb-2 col-2">
                <label for="color" class="form-label">Colore Badge</label>
                <input class="form-control" type="color" name="color" id="color">
            </div>
            
            <div>
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