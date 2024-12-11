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
                <select name="product_id" id="product_id"
                    class="w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                    required>
                    <option value="" data-description="">Seleccione un producto</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-description="{{ $product->description }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                            ({{ $product->size }})
                        </option>
                    @endforeach
                </select>
                <div id="product-description" class="mt-2 text-gray-600"></div>
                @error('product_id')
                    <div class="invalid-feedback text-red-600 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <script>
                document.getElementById('product_id').addEventListener('change', function () {
                    const selectedOption = this.options[this.selectedIndex];
                    const description = selectedOption.getAttribute('data-description');
                    document.getElementById('product-description').innerText = description || 'No hay descripción disponible.';
                });

                // Mostrar descripción preseleccionada al cargar la página
                window.addEventListener('DOMContentLoaded', () => {
                    const select = document.getElementById('product_id');
                    const selectedOption = select.options[select.selectedIndex];
                    const description = selectedOption.getAttribute('data-description');
                    document.getElementById('product-description').innerText = description || 'No hay descripción disponible.';
                });
            </script>

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
            <div class="mb-4">
                <label for="quantity" class="block text-pink-600 font-semibold mb-2">Cantidad</label>
                <input type="number" name="quantity" id="quantity" value="{{old("quantity")}}"
                class="w-1/3 px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
                @error('quantity')
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
