@extends('layouts.layout')
@section('title', 'Lista de Libros')
@section('content')

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full lg:w-3/4">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="relative">
                        <div class="bg-blue-600 text-white text-lg font-semibold p-4 text-center">
                            LISTA DE LIBROS 2024
                        </div>
                        <a href="{{ route('books.create') }}" class="absolute top-2 right-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Crear
                        </a>
                    </div>
                    <div class="p-4">
                        <table class="min-w-full bg-white text-center">
                            <thead>
                                <tr>
                                    <th class="w-1/4 py-2 text-center bg-blue-100 px-4">Título</th>
                                    <th class="w-1/4 py-2 text-center bg-blue-100 px-4">Editorial</th>
                                    <th class="w-1/6 py-2 text-center bg-blue-100 px-4">Edición</th>
                                    <th class="w-1/6 py-2 text-center bg-blue-100 px-4">País</th>
                                    <th class="w-1/6 py-2 text-center bg-blue-100 px-4">Precio</th>
                                    <th class="w-1/6 py-2 text-center bg-blue-100 px-4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr class="border-t">
                                    <td class="py-2 px-4">{{ $book->titulo }}</td>
                                    <td class="py-2 px-4">{{ $book->editorial->nombre }}</td>
                                    <td class="py-2 px-4">{{ $book->edicion }}</td>
                                    <td class="py-2 px-4">{{ $book->pais }}</td>
                                    <td class="py-2 px-4">{{ $book->precio }}</td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('books.edit', $book->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Editar
                                            </a>
                                            <button type="button" onclick="ConfirmDelete('{{ $book->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Eliminar
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script>
        function ConfirmDelete(id) {
            if (confirm("¿Estás seguro de eliminar el libro?")) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/books/' + id;
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>