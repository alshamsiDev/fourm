<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_un_auth_user_cannot_add_replies()
    {
        /** @var User $user */
        $user = factory('App\User')->create();
        $thread = factory('App\Thread')->create(['user_id' => $user->id]);
        $reply = factory('App\Reply')->make(['user_id' => $user->id, 'thread_id' => $thread->id]);
        $this->post("/threads/1/replies", $reply->toArray())->assertRedirect(route('login'));
    }

    /** @test */
    public function an_auth_user_can_participate_in_forum_threads()
    {
        /** @var User $user */
        $user = factory('App\User')->create();
        $this->signIn($user);
        /** @var Thread $thread */
        $thread = factory('App\Thread')->create(['user_id' => $user->id]);
        $reply = factory('App\Reply')->make(['user_id' => $user->id, 'thread_id' => $thread->id]);
        $this->post("/threads/$thread->id/replies", $reply->toArray())
            ->assertSee($reply->body);

    }

}
