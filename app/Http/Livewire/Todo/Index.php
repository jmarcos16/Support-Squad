<?php

namespace App\Http\Livewire\Todo;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Livewire\Component;

class Index extends Component
{
    /**
     * Render Todos Component.
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        return view('livewire.todo.index', [
            'todos' => auth()->user()->todos()->latest()->simplePaginate(5) /** @phpstan-ignore-line */,
        ]);
    }
}
