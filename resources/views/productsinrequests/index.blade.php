<x-app-layout>
    <h1>Productos en la Solicitud: {{ $rekest->name }}</h1>

    <a href="{{ route('productsinrequests.create', $rekest->id) }}" class="btn btn-primary">Agregar Producto</a>

    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->description }}</li>
        @endforeach
    </ul>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</x-app-layout>
