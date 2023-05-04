<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Livewire\Component;

class Create extends Component
{
    public string|int $title;

    public string $deadline;

    public string|int $user_id;

    public bool $isModalOpen = false;

    /**
     * @var array<string, array<int, string>>
     */
    protected array $rules = [
        'title'    => ['required', 'string', 'min:3', 'max:255'],
        'deadline' => ['required', 'date'],
    ];

    /**
     * @var array<string, string>
     */
    protected $listeners = ['openCreateModal' => 'openModal', 'closeCreateModal' => 'closeModal'];

    public function render(): Factory|View|Application
    {
        return view('livewire.todo.create');
    }

    public function save(): void
    {
        $this->validate();

        Todo::query()->create([
            'title'    => $this->title,
            'deadline' => $this->deadline,
            'user_id'  => auth()->user()->id,
        ]);

        $this->emit('todo::created');
        $this->closeModal();
    }

    public function openModal(): void
    {
        $this->isModalOpen = true;
        $this->title       = '';
        $this->deadline    = '';
    }

    public function closeModal(): void
    {
        $this->isModalOpen = false;
    }
}
