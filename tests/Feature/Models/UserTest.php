<?php

namespace Tests\Feature\Models;

use App\Models\{Todo, User};

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('should be able filter the task of users', function () {
    $todo = Todo::factory()->create([
        'user_id'  => $this->user->id,
        'title'    => 'My todo',
        'deadline' => now()->addDay(),
    ]);

    $todo2 = Todo::factory()->create([
        'user_id'  => $this->user->id,
        'title'    => 'My todo 2',
        'deadline' => now()->addDay(),

    ]);

    $todo3 = Todo::factory()->create([
        'user_id'  => $this->user->id,
        'title'    => 'My todo 3',
        'deadline' => now()->addDay(),
    ]);

    $todos = $this->user->filterAllTodos('My todo', ['title', 'deadline']);

    expect($todos->count())->toBe(3);
    expect($todos->first()->title)->toBe('My todo');
});

it('should be able search all coluns in array param', function () {
    $todo = Todo::factory()->create([
        'user_id'  => $this->user->id,
        'title'    => 'My todo',
        'deadline' => now()->addDay(),
    ]);

    $todo2 = Todo::factory()->create([
        'user_id'  => $this->user->id,
        'title'    => 'My todo 2',
        'deadline' => now()->addDay(),

    ]);

    $todo3 = Todo::factory()->create([
        'user_id'  => $this->user->id,
        'title'    => 'My todo 3',
        'deadline' => now()->addDay(),
    ]);

    $todos = $this->user->filterAllTodos('My todo', ['title', 'deadline']);

    expect($todos->count())->toBe(3);
    expect($todos->first()->title)->toBe('My todo');

    $todos2 = $this->user->filterAllTodos('My todo 2', ['title']);
    expect($todos2->count())->toBe(1);
    expect($todos2->first()->title)->toBe('My todo 2');

    $todo3 = $this->user->filterAllTodos(now()->addDay()->format('Y-m-d'), ['deadline']);

    expect($todo3->count())->toBe(3);
    expect($todo3->first()->deadline)->toBe(now()->addDay()->format('Y-m-d H:i:s'));
});
