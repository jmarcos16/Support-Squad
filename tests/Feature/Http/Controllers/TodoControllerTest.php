<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, get};

test('todo page loads', function () {
    $user = User::factory()->create();
    actingAs($user);

    get('/todo')
        ->assertStatus(200)
        ->assertViewIs('todo');
});
