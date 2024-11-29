@props(['disabled' => false])

<input @disabled($disabled)  {{ $attributes->merge(['class' => 'border-pink-300 bg-pink-50 text-gray-800 focus:border-pink-400 focus:ring-pink-300 rounded-lg shadow-sm']) }} >
