<div>
    {{-- Table all todos --}}
    <div class="table w-full overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <table class="w-full text-left min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
                <tr>
                    <th colspan="col"
                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Todo</th>
                    <th colspan="col"
                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Status</th>
                    <th colspan="col"
                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Deadline</th>
                    <th colspan="col"
                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Created At</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach ($todos as $todo)
                    <tr>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $todo->title }}</td>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $todo->status }}</td>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $todo->deadline }}</td>
                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $todo->created_at }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <div class="float-right my-2">
        {{ $todos->links() }}
    </div>

</div>
