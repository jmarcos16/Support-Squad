<?php

namespace App\Http\Livewire\Todo;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public string $status = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.todo.index', [
            'todos' => auth()->user()->todos() /** @phpstan-ignore-line */
                ->where('status', 'like', '%' . $this->status . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('deadline', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(8),
        ]);
    }
}
