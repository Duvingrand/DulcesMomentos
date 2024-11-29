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

            <!-- Nombre del producto -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    required>
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="price" name="price"
                    value="{{ old('price', $product->price ?? '') }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    required>
                @error('price')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tamaño: reemplazado con un select -->
            <div class="mb-4">
                <label for="size" class="block text-sm font-medium text-gray-700">Tamaño</label>
                <select id="size" name="size"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                    <option value="pequeño" {{ old('size', $product->size ?? '') == 'pequeño' ? 'selected' : '' }}>Pequeño</option>
                    <option value="mediano" {{ old('size', $product->size ?? '') == 'mediano' ? 'selected' : '' }}>Mediano</option>
                    <option value="grande" {{ old('size', $product->size ?? '') == 'grande' ? 'selected' : '' }}>Grande</option>
                </select>
                @error('size')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Categoría -->
            <div class="mb-6">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="category_id" name="category_id"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
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
</x-app-layout>
