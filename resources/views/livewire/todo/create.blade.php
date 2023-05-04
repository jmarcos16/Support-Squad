<x-form-modal x-data="{
    closeModal() {
        $el.addEventListener('click', (element) => {
            if (element.target.classList.contains('fixed')) {
                Livewire.emit('closeCreateModal');
                $el.querySelector('form').reset();
            }
        })
    }
}" x-init="closeModal($el)" class="{{ $isModalOpen == false ? 'hidden' : 'block' }}">

    <x-form-modal.body title="Create a new Todo" wire:submit.prevent="save"
        class="{{ $isModalOpen == false ? 'opacity-0' : 'opacity-100' }}">
        <x-input-label for="title" :value="__('Todo title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus
            autocomplete="title" placeholder="Title todo" wire:model="title" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />

        <x-input-label for="deadline" :value="__('Deadline')" class="mt-5" />
        <x-text-input id="deadline" name="deadline" type="date" class="mt-1 block w-full" required autofocus
            autocomplete="deadline" placeholder="Deadline todo" wire:model="deadline" />
        <x-input-error class="mt-2" :messages="$errors->get('deadline')" />


        <x-primary-button type="submit" class="mt-5">Create</x-primary-button>
        <x-danger-button type="button" class="mt-5" wire:click="$emit('closeCreateModal')">Cancel</x-danger-button>
    </x-form-modal.body>

</x-form-modal>
