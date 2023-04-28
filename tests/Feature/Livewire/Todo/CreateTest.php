<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo\Create;
use App\Models\User;

use function Pest\Laravel\actingAs;

// use function Pest\Livewire\livewire;

// uses(TestCase::class);

// test('test', function () {
//     $user = User::factory()->create();
//     actingAs($user);

//     livewire(Create::class)
//        ->set('title', 'Test')
//        ->call('createTodo')
//        ->assertEmitted('todoCreated');
