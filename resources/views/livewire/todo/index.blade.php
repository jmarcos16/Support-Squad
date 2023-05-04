<div>

    {{-- Filters todo --}}

    <div class="mt-6 mb-2 md:flex md:items-center md:justify-between">
        <div
            class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button wire:click="$set('status', '')"
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                View all
            </button>

            <button wire:click="$set('status', 'pending')"
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                In Progress
            </button>

            <button wire:click="$set('status', 'completed')"
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Completed
            </button>
        </div>

        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                </svg>
            </span>

            <input type="text" placeholder="Search" id="search"
                class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                wire:model="search">
        </div>
    </div>

    {{-- Table all todos --}}

    <x-table>
        <x-slot name="head">
            <x-table.heading name="Todo" />
            <x-table.heading name="Status" />
            <x-table.heading name="Deadline" />
            <x-table.heading name="Created At" />
            <x-table.heading name="Action" class="text-center" />
        </x-slot>

        <x-slot name="body">
            @foreach ($todos as $todo)
                <x-table.row>
                    <x-table.cell>{{ $todo->title }}</x-table.cell>
                    <x-table.cell>
                        <div
                            class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                            {{ $todo->status }}
                        </div>
                    </x-table.cell>
                    <x-table.cell>{{ date('d-m-Y', strtotime($todo->deadline)) }}</x-table.cell>
                    <x-table.cell>{{ date('d-m-Y', strtotime($todo->created_at)) }}</x-table.cell>
                    <x-table.cell class="text-center">
                        <x-primary-button wire:click="edit({{ $todo->id }})">
                            Edit
                        </x-primary-button>

                        <x-danger-button wire:click="delete({{ $todo->id }})">
                            Delete
                        </x-danger-button>
                    </x-table.cell>

                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>

    {{-- Pagination --}}
    <div class=" my-2">
        {{ $todos->links() }}
    </div>
</div>
