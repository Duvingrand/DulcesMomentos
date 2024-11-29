<!-- resources/views/clients/index.blade.php -->

<x-app-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-pink-600">Lista de Clientes</h1>

        <!-- Mensaje de éxito, si existe -->
        @if(session('success'))
            <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Enlace para crear un nuevo cliente -->
        <a href="{{ route('clients.create') }}" class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 mb-6 inline-block">
            Crear Nuevo Cliente
        </a>

        <!-- Tabla de clientes -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-pink-50 text-pink-700">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Direccion</th>
                        <th class="px-4 py-2 text-left">Teléfono</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr class="border-t hover:bg-pink-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $client->name }}</td>
                            <td class="px-4 py-2">{{ $client->address }}</td>
                            <td class="px-4 py-2">{{ $client->phone_number }}</td>
                            <td class="px-4 py-2 space-x-4">
                                <!-- Botones de ver, editar y eliminar -->
                                <a href="{{ route('clients.show', $client->id) }}" class="text-pink-500 hover:text-pink-700">
                                    Ver
                                </a>
                                <a href="{{ route('clients.edit', $client->id) }}" class="text-pink-500 hover:text-pink-700">
                                    Editar
                                </a>

                                <!-- Formulario para eliminar el cliente -->
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
