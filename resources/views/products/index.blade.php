
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-semibold text-center text-pink-600 mb-6">Lista de Productos</h1>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón para crear un nuevo producto -->
        <div class="mb-6 text-right">
            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-pink-600 text-white rounded-lg shadow-md hover:bg-pink-700 focus:outline-none">
                Crear Nuevo Producto
            </a>
        </div>

        <!-- Tabla de productos -->
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead class="bg-pink-100 text-pink-600">
                <tr>
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Descripción</th>
                    <th class="px-4 py-2 text-left">Precio</th>
                    <th class="px-4 py-2 text-left">Tamaño</th>
                    <th class="px-4 py-2 text-left">Categoría</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-pink-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $product->name }}</td>
                        <td class="px-4 py-2">{{ $product->description }}</td>
                        <td class="px-4 py-2">${{ number_format($product->price) }}</td>
                        <td class="px-4 py-2">{{ $product->size }}</td>
                        <td class="px-4 py-2">{{ $product->category->name }}</td>
                        <td class="px-4 py-2">
                            <div class="flex flex-col space-y-2">
                                <!-- Botón Ver -->
                                <a href="{{ route('products.show', $product->id) }}" class="text-pink-500 hover:text-pink-700">
                                    Ver
                                </a>
                                <!-- Botón Editar -->
                                <a href="{{ route('products.edit', $product->id) }}" class="text-pink-500 hover:text-pink-700">
                                    Editar
                                </a>
                                <!-- Formulario para Eliminar -->
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-pink-500 hover:text-pink-700">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
