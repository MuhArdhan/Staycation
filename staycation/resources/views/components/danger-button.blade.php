<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex flex-1 justify-center items-center py-3.5 px-6 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition shadow-red-200']) }}>
    {{ $slot }}
</button>
