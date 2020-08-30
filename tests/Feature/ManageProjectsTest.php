<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ManageProjectsTest extends TestCase
{
    use WithFaker,RefreshDatabase;

  /** @test */
  public function guests_cannot_manage_projects(){
    $project=factory('App\Project')->raw();
    $this->get('/projects')->assertRedirect('login');
    $this->get('/projects/create')->assertRedirect('login');
    $this->get($project->path().'/edit')->assertRedirect('login');
    $this->get($project->path())->assertRedirect('login');
    $this->post('/projects',$project->toArray())->assertRedirect('login');
 
 }

  /** @test */
  public function a_user_can_create_a_ticket()
  {
    $this->signIn();
    $this->get('/projects/create')->assertStatus(200);
      $attributes = [
        'title' => $this->faker->sentence,
        'description' => $this->faker->sentence,
        'status' => 'submitted'
      ];
      $response = $this->post('/projects',$attributes);
      $project = Project::where($attributes)->first();

      $response->assertRedirect($project->path());

      
      $this->get($project->path())
        ->assertSee($attributes['title'])
        ->assertSee($attributes['description'])
        ->assertSee($attributes['status']);
  }


     /** @test */
     function a_user_can_update_a_ticket()
     {
         $project = ProjectFactory::create();
 
         $this->actingAs($project->owner)
              ->patch($project->path(), $attributes = ['title' => 'Changed', 'description' => 'Changed', 'status' => 'Changed'])
              ->assertRedirect($project->path());
 
         
              $this->get($project->path().'/edit')->assertOk();
 
         $this->assertDatabaseHas('projects', $attributes);
     }  

  /** @test */
  public function a_user_can_view_their_project(){
    $project = ProjectFactory::create();

    $this->actingAs($project->owner)->get($project->path())
        ->assertSee($project->title)
        ->assertSee($project->description);

  }
  /** @test */
  public function an_authenticated_user_cannot_update_the_projects_of_others(){
    $this->signIn();

    $project = factory('App\Project')->create();
    $this->patch($project->path())->assertStatus(403);
  }

    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others(){
      $this->be(factory('App\User')->create());
  
      $project = factory('App\Project')->create();
      $this->get($project->path())->assertStatus(403);
    }


  /** @test */
  public function a_project_require_a_title(){
    $this->signIn();
    $attributes=factory('App\Project')->raw(['title'=> '']);
    $this->post('/projects',$attributes)->assertSessionHasErrors('title');
  }

  /** @test */
  public function a_project_require_a_description(){
    $this->signIn();
    $attributes=factory('App\Project')->raw(['description'=> '']);
     $this->post('/projects',$attributes)->assertSessionHasErrors('description');
  }

  /** @test */
public function a_user_can_delete_a_ticket(){
  $project = ProjectFactory::create();
 
  $this->actingAs($project->owner)
       ->delete($project->path())
       ->assertRedirect('/projects');
       $this->assertDatabaseMissing('projects', $project->only('id'));
}
    /** @test */
    function unauthorized_users_cannot_delete_ticketss()
    {
        $project = ProjectFactory::create();

        $this->delete($project->path())
            ->assertRedirect('/login');

        $user = $this->signIn();

        $this->delete($project->path())->assertStatus(403);


    }


}
