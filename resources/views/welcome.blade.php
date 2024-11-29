<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulces Momentos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-pink-100 h-screen flex items-center justify-center">
    <div id="loading" class="flex flex-col items-center justify-center">
        <div class="w-16 h-16 border-4 border-pink-300 border-t-pink-500 rounded-full animate-spin"></div>
        <p class="mt-4 text-pink-600 font-semibold">Cargando...</p>
    </div>

    <script>
        // Simula la lógica para redirigir
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                @if (Auth::check())
                    window.location.href = "{{ route('dashboard') }}";
                @else
                    window.location.href = "{{ route('login') }}";
                @endif
            }, 3000); // Cambiar después de 3 segundos
        });
    </script>
</body>
</html>
