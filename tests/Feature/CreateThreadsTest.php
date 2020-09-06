<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guess_cannot_create_thread()
    {
        $thread = factory('App\Thread')->make();
        $this->post('/threads', $thread->toArray())
            ->assertRedirect(route('login'));

    }
    /** @test */
    public function an_auth_user_can_create_new_forum_thread()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        /** @var Thread $thread */
        $thread = factory('App\Thread')->make();
        $this->post('/threads', $thread->toArray());
        $this->get('/threads' . $thread->id)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
