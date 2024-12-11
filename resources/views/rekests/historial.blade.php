<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-pink-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="p-6 text-pink-800 flex flex-col sm:flex-row sm:justify-center sm:space-x-4 space-y-4 sm:space-y-0">

                    <a href="{{ route('dashboard') }}">
                    <button class="bg-pink-200 px-4 py-2 rounded hover:bg-pink-100 transition duration-200 ease-in-out">
                        Ver pedidos activos
                    </button>
                    </a>

                    <button class="bg-pink-200 px-4 py-2 rounded hover:bg-pink-100 transition duration-200 ease-in-out">
                        filtrar
                    </button>
                </div>

            </div>

            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-pink-50 text-pink-700">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Fecha de entrega</th>
                            <th class="px-4 py-2 text-left">Estado</th>
                            <th class="px-4 py-2 text-left">Cliente</th>
                            <th class="px-4 py-2 text-left">N Productos</th>
                            <th class="px-4 py-2 text-left">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekests as $rekest)
                            <tr class="border-t hover:bg-pink-50">
                                <td class="px-4 py-2">{{ $rekest->id }}</td>
                                <td class="px-4 py-2">{{ $rekest->delivery_day }}</td>
                                <td class="px-4 py-2">{{ $rekest->status }}</td>
                                <td class="px-4 py-2">{{ $rekest->client->name }}</td>
                                <td class="px-4 py-2">{{ $rekest->products->count()}}</td>
                                <td class="px-4 py-2 space-x-4">
                                    <a href="{{ route('rekests.show', $rekest->id) }}" class="text-pink-500 hover:text-pink-700">
                                        Ver detalles
                                    </a>
                                    <a href="{{ route('rekests.destroy', $rekest->id) }}" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="event.preventDefault(); if(confirm('¿Estás seguro de eliminar este pedido?')) { document.getElementById('delete-form-{{ $rekest->id }}').submit(); }">
                                        Eliminar
                                    </a>

                                    <!-- Formulario de eliminación de pedido -->
                                    <form id="delete-form-{{ $rekest->id }}" action="{{ route('rekests.destroy', $rekest->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
