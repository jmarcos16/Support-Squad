<div
    {{ $attributes->merge(['class' => 'fixed z-30 left-0 top-0 w-full h-full overflow-auto bg-slate-900 transition-all ease-in-out duration-300 bg-opacity-40 ']) }}>

    {{ $slot }}
</div>
