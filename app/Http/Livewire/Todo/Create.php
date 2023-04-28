<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Livewire\Component;

class Create extends Component
{
    public string $title;

    public string $deadline;

    public int $user_id;

    public function render(): Factory|View|Application
    {
        return view('livewire.todo.create');
    }

    public function save(): void
    {
        Todo::query()->create([
            'title'    => $this->title,
            'deadline' => $this->deadline,
            'user_id'  => $this->user_id,
        ]);
    }
}
