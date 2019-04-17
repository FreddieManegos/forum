<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_authenticated_user_can_create_new_forum_thread(){
        //Given that we have a signed user

        $this->actingAs(factory('App\User')->create());

        // When we hit the endpoint to create a new thread1

        $thread = factory('App\Thread')->make();
        $this->post('/threads',$thread->toArray());

        // Then we visit the thread page

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
