<!-- resources/views/clients/create.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-pink-600">Crear Nuevo Cliente</h1>

        <!-- Mensaje de error, si existe -->
        @if ($errors->any())
            <div class="alert alert-danger mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear un nuevo cliente -->
        <form action="{{ route('clients.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Campo de Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-pink-600 font-semibold mb-2">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                       class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- Campo de Dirección -->
            <div class="mb-4">
                <label for="address" class="block text-pink-600 font-semibold mb-2">Dirección</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" 
                       class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- Campo de Teléfono -->
            <div class="mb-4">
                <label for="phone_number" class="block text-pink-600 font-semibold mb-2">Teléfono</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" 
                       class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-between">
                <a href="{{ route('clients.index') }}" class="text-pink-500 hover:text-pink-700">
                    Cancelar
                </a>
                <button type="submit" class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
