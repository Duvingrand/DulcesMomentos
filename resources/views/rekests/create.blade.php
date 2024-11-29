<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-pink-600">Crear Nuevo Pedido</h1>

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


        <!-- Formulario para crear un nuevo Rekest -->
        <form action="{{ route('rekests.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Campo de Día de entrega -->
            <div class="mb-4">
                <label for="delivery_day" class="block text-pink-600 font-semibold mb-2">Día de entrega</label>
                <input type="date" name="delivery_day" id="delivery_day" value="{{ old('delivery_day') }}"
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 @error('delivery_day') is-invalid @enderror">
                @error('delivery_day')
                    <div class="invalid-feedback text-red-600 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Cliente -->
            <div class="mb-4">
                <label for="client_id" class="block text-pink-600 font-semibold mb-2">Seleccionar Cliente</label>
                <select name="client_id" id="client_id"
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 @error('client_id') is-invalid @enderror"
                    required>
                    <option value="">Seleccione un cliente</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
                @error('client_id')
                    <div class="invalid-feedback text-red-600 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('rekests.index') }}" class="text-pink-500 hover:text-pink-700">
                    Cancelar
                </a>
                <button type="submit" class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600">
                    Crear Pedido
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
