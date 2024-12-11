<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-pink-600">Detalles de la Solicitud</h1>
        <!-- Lista de productos asociados a la solicitud -->
        <div class="mb-6 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-pink-600 mb-4">Productos en el Pedido</h2>

            @if ($rekest->products->isEmpty())
                <p>No hay productos asociados a este pedido.</p>
            @else
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left border-b">Producto</th>
                            <th class="py-2 px-4 text-left border-b">Personalización</th>
                            <th class="py-2 px-4 text-left border-b">Cantidad</th>
                            <th class="py-2 px-4 text-left border-b">Precio</th>
                            <th class="py-2 px-4 text-left border-b">Total</th>
                            <th class="py-2 px-4 text-left border-b">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekest->products as $productInRequest)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $productInRequest->product->name }}</td>
                                <td class="py-2 px-4 border-b">
                                    {{ $productInRequest->personalization ?? 'Sin personalización' }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    {{ $productInRequest->quantity }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    {{ '$' . number_format($productInRequest->product->price) }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    {{ '$' . number_format($productInRequest->product->price * $productInRequest->quantity) }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <!-- Solo mostramos el enlace de eliminar si el estado es "pendiente" -->
                                    @if ($rekest->status == 'Pendiente')
                                        <form id="delete-form-{{ $productInRequest->id }}"
                                            action="{{ route('productInRequest.destroy', $productInRequest->id) }}"
                                            method="POST" style="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                Eliminar
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-500">Eliminar (No disponible)</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="py-2 px-4 text-right font-semibold">Total:</td>
                            <td colspan="2" class="py-2 px-4 font-semibold">
                                {{ '$' . number_format($rekest->products->sum(fn($item) => $item->product->price * $item->quantity)) }}
                            </td>
                        </tr>
                    </tfoot>

                </table>
            @endif
            <!-- Enlace para agregar un producto, solo si el estado es "pendiente" -->
            @if ($rekest->status == 'Pendiente')
                <div class="mt-4">
                    <a href="{{ route('productsinrequests.create', $rekest->id) }}"
                        class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600">
                        Agregar Producto
                    </a>
                </div>
            @else
                <div class="mt-4">
                    <span class="text-gray-500">Agregar Producto (No disponible)</span>
                </div>
            @endif
        </div>


        <!-- Información del Rekest -->
        <div class="my-6 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-pink-600 mb-4">Información del Pedido</h2>

            <div class="mb-4">
                <strong class="text-pink-600">Cliente:</strong>
                <p>{{ $rekest->client->name }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-pink-600">Día de Entrega:</strong>
                <p>{{ $rekest->delivery_day }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-pink-600">Estado:</strong>
                <p>{{ $rekest->status }}</p>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600">
            Regresar a pedidos
        </a>

    </div>

</x-app-layout>
