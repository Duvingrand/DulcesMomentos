<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-pink-600">Agregar Producto a la Solicitud de
            {{ $rekest->client->name }}</h1>

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

        <!-- Formulario para agregar un producto -->
        <form action="{{ route('productsinrequests.store', $rekest->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Selección de Producto -->
            <div class="mb-4">
                <label for="product_id" class="block text-pink-600 font-semibold mb-2">Seleccionar Producto</label>
                <label for="product_id" class="block text-pink-600 font-semibold mb-2">{{ $rekest->id }}</label>
                <select name="product_id" id="product_id"
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                    required>
                    <option value="">Seleccione un producto</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="invalid-feedback text-red-600 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Personalización -->
            <div class="mb-4">
                <label for="personalization" class="block text-pink-600 font-semibold mb-2">Personalización</label>
                <input type="text" name="personalization" id="personalization" value="{{ old('personalization') }}"
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                    placeholder="Ingrese detalles de personalización">
                @error('personalization')
                    <div class="invalid-feedback text-red-600 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('rekests.show', $rekest->id) }}" class="text-pink-500 hover:text-pink-700">
                    Cancelar
                </a>
                <button type="submit" class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600">
                    Agregar Producto
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
