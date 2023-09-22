<div {{ $attributes->merge(['class' => 'relative z-[1] sticky top-16 md:top-20 flex flex-row-reverse justify-between items-center mb-4 p-2 px-6 border-b border-gray-400 rounded-b-md drop-shadow-md md:drop-shadow-none md:rounded-none bg-stone-100 dark:bg-stone-900 dark:border-gray-600  ']) }}>
    {{ $slot }}
</div>