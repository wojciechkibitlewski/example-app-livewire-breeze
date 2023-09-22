<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full block rounded-md my-6 py-2 items-center text-center font-semibold  text-sm border bg-orange-600 dark:bg-orange-900 border-orange-600 text-gray-100 dark:text-gray-100 hover:bg-orange-700 dark:hover:bg-orange-700 ']) }}>
    {{ $slot }}
</button>
