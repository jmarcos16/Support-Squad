<?php

use App\Models\{Todo, User};

it('should be able to see todos', function () {
    $user  = \App\Models\User::factory()->create();
    $todos = \App\Models\Todo::factory()->count(3)->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user)
        ->get(route('todo.index'))
        ->assertSee($todos[0]->title)
        ->assertSee($todos[1]->title)
        ->assertSee($todos[2]->title);
});

it('should be able list just my todos', function () {
    $user  = User::factory()->create();
    $todos = Todo::factory()->count(3)->create([
        'user_id' => $user->id,
    ]);

    $user2 = User::factory()->create();

    $this->actingAs($user2);

    $this->get(route('todo.index'))
        ->assertDontSee($todos[0]->title)
        ->assertDontSee($todos[1]->title)
        ->assertDontSee($todos[2]->title);
});
