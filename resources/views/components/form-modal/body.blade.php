@props(['title'])

<form
    {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-700 dark:border-gray-600 z-30 m-auto mt-[10%]  max-w-[90%]  lg:max-w-[25%] p-8 rounded-lg border ']) }}>
    @csrf
    <h3 class="text-2xl font-bold mb-2 dark:text-white">{{ $title }}</h3>

    {{ $slot }}
</form>
