<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex flex-1 justify-center items-center py-3.5 px-6 border border-gray-300 rounded-xl bg-white text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
