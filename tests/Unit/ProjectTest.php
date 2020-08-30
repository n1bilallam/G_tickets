<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    
   /** @test */
   public function it_has_a_path(){
       $project = factory('App\Project')->create();
       $this->assertEquals('/projects/' . $project->id, $project->path());
   }

   /** @test */
   public function it_belongs_to_an_owner(){
    $project = factory('App\Project')->create();
    $this->assertInstanceOf('App\User',$project->owner);
   }
   /** @test */
   public function it_can_add_a_comment(){
    $project = factory('App\Project')->create();
    $comment = $project->addComment("body comment");
    $this->assertCount(1,$project->comments);
    $this->assertTrue($project->comments->contains($comment));
   }
   
}
