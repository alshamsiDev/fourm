<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();

    }

    /** @test */
    public function user_can_browse_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function user_can_see_thread()
    {
        $this->get(route('threads.show', $this->thread->id))
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function user_can_read_replies_that_are_associated_with_thread()
    {
        /** @var Reply $reply */
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        $this->get(route('threads.show', $this->thread->id))
            ->assertSee($reply->body);
    }

}
