@extends('layouts.layout')
@section('title', 'Editar Libro')
@section('content')
<div class="flex justify-center mt-8">
    <div class="w-full lg:w-1/2 bg-stone-100 shadow-inner rounded-lg p-8">
        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Editar Libro</h2>
        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="titulo" class="block text-gray-700 font-bold mb-1">Título:</label>
                <input type="text" name="titulo" id="titulo" value="{{ $book->titulo }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="editorial_id" class="block text-gray-700 font-bold mb-1">Editorial:</label>
                <select name="editorial_id" id="editorial_id" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="edicion" class="block text-gray-700 font-bold mb-1">Edición:</label>
                <input type="text" name="edicion" id="edicion" value="{{ $book->edicion }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="pais" class="block text-gray-700 font-bold mb-1">País:</label>
                <input type="text" name="pais" id="pais" value="{{ $book->pais }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="precio" class="block text-gray-700 font-bold mb-1">Precio:</label>
                <input type="number" name="precio" id="precio" value="{{ $book->precio }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('books.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-200">Cancelar</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection