@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'px-4 py-3 rounded-xl border-gray-300 border shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out placeholder-gray-400']) }}>
