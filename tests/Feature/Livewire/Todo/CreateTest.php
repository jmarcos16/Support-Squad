<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo;
use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount};
use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    actingAs($this->user);
});

it('should be able create a todo', function () {
    livewire(Todo\Create::class)
        ->set('title', 'My first todo')
        ->set('deadline', now()->addDay())
        ->set('user_id', auth()->user()->id)
        ->call('save')
        ->assertHasNoErrors();

    assertDatabaseCount('todos', 1);
});

# Reagion Validation

test('validate title is riquired', function () {
    livewire(Todo\Create::class)
        ->set('title', '')
        ->set('deadline', now()->addDay())
        ->set('user_id', auth()->user()->id)
        ->call('save')
        ->assertHasErrors(['title' => 'required']);
});

test('validate title is string', function () {
    livewire(Todo\Create::class)
        ->set('title', 123)
        ->set('deadline', now()->addDay())
        ->set('user_id', auth()->user()->id)
        ->call('save')
        ->assertHasErrors(['title' => 'string']);
});

test('validate title is min 3', function () {
    livewire(Todo\Create::class)
        ->set('title', 'aa')
        ->set('deadline', now()->addDay())
        ->set('user_id', auth()->user()->id)
        ->call('save')
        ->assertHasErrors(['title' => 'min']);
});

test('validate title is max 255', function () {
    livewire(Todo\Create::class)
        ->set('title', str_repeat('a', 256))
        ->set('deadline', now()->addDay())
        ->set('user_id', auth()->user()->id)
        ->call('save')
        ->assertHasErrors(['title' => 'max']);
});

test('validate deadline is date', function () {
    livewire(Todo\Create::class)
        ->set('title', 'My first todo')
        ->set('deadline', 'not a date')
        ->set('user_id', auth()->user()->id)
        ->call('save')
        ->assertHasErrors(['deadline' => 'date']);
});

test('validate deadline is required', function () {
    livewire(Todo\Create::class)
        ->set('title', 'My first todo')
        ->set('deadline', '')
        ->set('user_id', auth()->user()->id)
        ->call('save')
        ->assertHasErrors(['deadline' => 'required']);
});

test('validate user_id is required', function () {
    livewire(Todo\Create::class)
        ->set('title', 'My first todo')
        ->set('deadline', now()->addDay())
        ->set('user_id', '')
        ->call('save')
        ->assertHasErrors(['user_id' => 'required']);
});

test('validate user_id is int', function () {
    livewire(Todo\Create::class)
        ->set('title', 'My first todo')
        ->set('deadline', now()->addDay())
        ->set('user_id', 'not an int')
        ->call('save')
        ->assertHasErrors(['user_id' => 'integer']);
});

test('validate user_id exists in users table', function () {
    livewire(Todo\Create::class)
        ->set('title', 'My first todo')
        ->set('deadline', now()->addDay())
        ->set('user_id', 999)
        ->call('save')
        ->assertHasErrors(['user_id' => 'exists']);
});

# End Region
