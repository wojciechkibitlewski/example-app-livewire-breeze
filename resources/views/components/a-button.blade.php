<button {{ $attributes->merge(['type' => 'button', 'class' => 'w-full md:inline md:w-auto rounded-md p-2 px-6 text-center font-semibold border bg-emerald-400 dark:bg-emerald-400 text-gray-950 dark:text-gray-950 hover:bg-orange-700 dark:hover:bg-orange-700 ']) }}>
    {{ $slot }}
</button>
