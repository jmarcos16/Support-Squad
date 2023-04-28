<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo;
use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount};
use function Pest\Livewire\livewire;

it('should be able create a todo', function () {
    $user = User::factory()->create();
    actingAs($user);

    livewire(Todo\Create::class)
        ->set('title', 'My first todo')
        ->set('deadline', now()->addDay())
        ->set('user_id', $user->id)
        ->call('save')
        ->assertHasNoErrors();

    assertDatabaseCount('todos', 1);
});
