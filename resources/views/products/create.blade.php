<!-- resources/views/products/create.blade.php -->

<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-semibold text-center text-pink-600 mb-6">
            {{ isset($product) ? 'Editar Producto' : 'Crear Nuevo Producto' }}
        </h2>

        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
            @csrf
            @isset($product)
                @method('PUT')
            @endisset

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-pink-700">Nombre del Producto</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}"
                    class="mt-2 w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    required>
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-pink-700">Descripción</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-2 w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tamaños y Precios -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-pink-700">Tamaños Disponibles</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="sizes[]" value="pequeño" class="size-checkbox">
                        <span class="ml-2">Pequeño</span>
                    </label>
                    <input type="number" name="price_pequeño" placeholder="Precio para pequeño"
                        class="size-price hidden mt-2 w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">

                    <label class="inline-flex items-center mt-4">
                        <input type="checkbox" name="sizes[]" value="mediano" class="size-checkbox">
                        <span class="ml-2">Mediano</span>
                    </label>
                    <input type="number" name="price_mediano" placeholder="Precio para mediano"
                        class="size-price hidden mt-2 w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">

                    <label class="inline-flex items-center mt-4">
                        <input type="checkbox" name="sizes[]" value="grande" class="size-checkbox">
                        <span class="ml-2">Grande</span>
                    </label>
                    <input type="number" name="price_grande" placeholder="Precio para grande"
                        class="size-price hidden mt-2 w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                </div>
                @error('sizes')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Categoría -->
            <div class="mb-6">
                <label for="category_id" class="block text-sm font-medium text-pink-700">Categoría</label>
                <select id="category_id" name="category_id"
                    class="mt-2 w-full px-4 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <div class="text-center">
                <button type="submit"
                    class="w-full py-2 px-4 bg-pink-600 text-white rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500">
                    {{ isset($product) ? 'Actualizar Producto' : 'Crear Producto' }}
                </button>
            </div>
        </form>
    </div>

    <script>
        // Mostrar u ocultar precios según el tamaño seleccionado
        document.querySelectorAll('.size-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const priceInput = checkbox.parentElement.nextElementSibling;
                if (checkbox.checked) {
                    priceInput.classList.remove('hidden');
                    priceInput.required = true;
                } else {
                    priceInput.classList.add('hidden');
                    priceInput.required = false;
                    priceInput.value = ''; // Limpia el valor cuando se deselecciona
                }
            });
        });
    </script>
</x-app-layout>
