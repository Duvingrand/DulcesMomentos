<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-pink-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="p-6 text-pink-800 flex flex-col sm:flex-row sm:justify-center sm:space-x-4 space-y-4 sm:space-y-0">
                    <a href="{{ route('rekests.create') }}">
                        <button
                            class="bg-pink-200 px-4 py-2 rounded hover:bg-pink-100 transition duration-200 ease-in-out">
                            Crear un nuevo pedido
                        </button>
                    </a>
                    <a href="{{ route('rekests.historial') }}">
                        <button
                            class="bg-pink-200 px-4 py-2 rounded hover:bg-pink-100 transition duration-200 ease-in-out">
                            Ver historial de pedidos
                        </button>
                    </a>
                    <a href="{{ route('rekests.historial') }}">
                        <button
                            class="bg-pink-200 px-4 py-2 rounded hover:bg-pink-100 transition duration-200 ease-in-out">
                            filtrar
                        </button>
                    </a>
                </div>

            </div>

            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto ">
                    <thead class="bg-pink-50 text-pink-700">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Fecha de entrega</th>
                            <th class="px-4 py-2 text-left">Días faltantes</th>
                            <th class="px-4 py-2 text-left">Cliente</th>
                            <th class="px-4 py-2 text-left"># Productos</th>
                            <th class="px-4 py-2 text-left">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekests as $rekest)
                            <tr class="border-t hover:bg-pink-50">
                                <td class="px-4 py-2">{{ $rekest->id }}</td>
                                <td class="px-4 py-2">{{ $rekest->delivery_day }}</td>

                                @php
                                    // Parseamos la fecha de entrega y la convertimos a solo fecha (sin horas)
                                    $deliveryDate = \Carbon\Carbon::parse($rekest->delivery_day)->startOfDay();

                                    // Calculamos la diferencia en días
                                    $daysLeft = now()->startOfDay()->diffInDays($deliveryDate);

                                    if ($deliveryDate->isToday()) {
                                        // Si es hoy, asignamos 0 como número de días restantes
                                        $daysLeft = 0;
                                        $statusClass = 'bg-red-200 font-bold px-4 py-2';
                                        $text = 'Hoy';
                                    } elseif ($daysLeft > 0) {
                                        // Si la fecha está en el futuro
                                        $statusClass = '';
                                        $text = $daysLeft . ' días';
                                    } else {
                                        // Si la fecha está en el pasado (usamos abs() para convertir el valor a positivo)
                                        $statusClass = 'bg-yellow-200 font-bold px-4 py-2';
                                        $text = abs($daysLeft) . ' días atrasado'; // Convertimos el valor negativo a positivo
                                    }
                                @endphp


                                <td class="px-4 py-2 {{ $statusClass }}">{{ $text }}</td>
                                <td class="px-4 py-2">{{ $rekest->client->name }}</td>
                                <td class="px-4 py-2 ">{{ $rekest->products->count() }}</td>
                                <td class="flex flex-col ">
                                    {{-- <a href="{{ route('productsinrequests.create', ['rekestId' => $rekest->id]) }}"
                                       class="text-pink-500 hover:text-pink-700  transition duration-300">
                                        Agregar productos
                                    </a> --}}
                                    <a href="{{ route('rekests.show', $rekest->id) }}"
                                       class="text-pink-500 hover:text-blue-700  transition duration-300">
                                        Ver detalles
                                    </a>
                                    <form action="{{ route('rekests.destroy', $rekest->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-pink-500 hover:text-red-700 transition duration-300"
                                            onclick="event.preventDefault(); if(confirm('¿Estás seguro de eliminar este pedido?')) { this.closest('form').submit(); }">
                                            Eliminar
                                        </button>
                                    </form>
                                    <form action="{{ route('rekests.changeStatus', $rekest->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-pink-500 hover:text-green-700 transition duration-300">
                                            Completar
                                        </button>
                                    </form>
                                    <form action="{{ route('rekests.changeStatus', $rekest->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-pink-500 hover:text-purple-700 transition duration-300">
                                            Rechazar
                                        </button>
                                    </form>
                                </td>




                                    <!-- Formulario de eliminación de pedido -->
                                    <form id="delete-form-{{ $rekest->id }}"
                                        action="{{ route('rekests.destroy', $rekest->id) }}" method="POST"
                                        style="display: none;">
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
