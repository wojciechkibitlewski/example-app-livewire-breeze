@props([
    'title' => ""
])

<h1 {{ $attributes->merge(['class' => 'uppercase md:mt-0']) }}>
    {{ $title }}
</h1>
