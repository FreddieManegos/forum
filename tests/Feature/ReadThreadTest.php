<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function a_user_can_browse_threads()
    {
        $thread = factory('App\Thread')->create();

        $this->get('/threads')->assertSee($thread->title);
    }

    /**@test*/
    function a_user_can_read_a_single_thread(){

        $thread = factory('App\Thread')->create();

        $this->get('/threads/' . $thread->id)
                    ->assertSee($thread->title);
    }

    /**@test*/
    function a_user_can_read_replies_that_are_associated_with_a_thread(){
        //Given we have thread
        // And that thread includes replies
        // When we visit  a thread page
        // Then we should see the replies
        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->create(['thread_id' => $thread->id ]);

        $this->get('/threads/' . $thread->id)
            ->assertSee($reply->body);
    }
}
