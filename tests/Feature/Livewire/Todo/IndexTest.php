<?php

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
