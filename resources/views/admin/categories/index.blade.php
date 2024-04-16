@extends('layouts.app')
@section('title', 'Progetti')

@section('content')
    <div class="container">
        <h1 class="my-3">Lista delle Categorie</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add new Category</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome della Categoria</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td><span class="badge lg" style="background-color: {{ $category->color }}">{{ $category->label }}</span></td>
                        <td>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="p-2 mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="submit" class="btn p-2 mx-2" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                        <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Nessun risultato trovato</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection