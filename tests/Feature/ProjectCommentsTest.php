<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ProjectCommentsTest extends TestCase
{
  use RefreshDatabase;

/** @test */
  public function a_project_can_have_comments(){

    $project = ProjectFactory::create();
    
    $this->actingAs($project->owner)->post($project->path() . '/comments',['body'=>"body comment"]);

    $this->get($project->path())->assertSee('body comment');

  }

  /** @test */
  public function a_comment_required_a_body(){
    $project = ProjectFactory::create();

    $attributes=factory('App\Comment')->raw(['body'=> '']);

    $this->actingAs($project->owner)->post($project->path() . '/comments',$attributes)->assertSessionHasErrors('body');
  }

  /** @test */
  function guest_cannot_add_comments_to_projects(){
    $project = factory('App\Project')->create();
    $this->post($project->path() . '/comments')->assertRedirect('login');

  }

  /** @test */
  function only_the_owner_of_a_project_may_add_tasks(){
      $this->signIn();
      $project = factory('App\Project')->create();
      $this->post($project->path() . '/comments', ['body'=>'body comment'])->assertStatus(403);
      $this->assertDatabaseMissing('comments', ['body'=>'body comment']);
  }

}
