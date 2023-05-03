<div x-data="{
    closeModal() {
        $el.addEventListener('click', (element) => {
            if (element.target.classList.contains('fixed')) {
                Livewire.emit('closeCreateModal')
            }
        })
    }
}" x-init="closeModal($el)"
    class="fixed z-30 left-0 top-0 w-full h-full overflow-auto bg-slate-900 transition-all ease-in-out duration-300 bg-opacity-40 {{ $isModalOpen == false ? 'hidden' : 'block' }} ">


    <form
        class="bg-white z-30 m-auto mt-[10%]  max-w-[90%]  lg:max-w-[25%] p-8 rounded-lg border {{ $isModalOpen == false ? 'opacity-0' : 'opacity-100' }}">
        <h3 class="text-2xl font-bold">Create a new Todo</h3>
        <x-input-label for="title" :value="__('Todo title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus
            autocomplete="title" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </form>
</div>
