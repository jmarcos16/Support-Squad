<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-between pt-6 px-6">
                    <div class="leading-none">
                        <h5 class="text-2xl font-bold dark:text-white">My Todos</h5>
                        <p class="text-gray-500 dark:text-gray-400">List of all my tasks exemple</p>
                    </div>
                    <div>
                        <i class='bx bx-plus absolute mt-2 text-white dark:text-gray-900 ml-2 cursor-pointer'></i>
                        <x-primary-button
                            class="bg-blue-600 text-white pl-7 pr-3 py-1 rounded-lg text-right font-sans hover:bg-blue-500 focus:bg-blue-800"
                            onclick="Livewire.emit('openCreateModal')">
                            Create Todo
                        </x-primary-button>

                        <livewire:todo.create />
                    </div>
                </div>

                <div class="px-6 text-gray-900 dark:text-gray-100">
                    <livewire:todo.index />
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
