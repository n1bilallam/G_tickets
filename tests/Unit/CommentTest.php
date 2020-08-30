<?php

namespace Tests\Unit;

use App\Comment;
use App\Project;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /**@test */
    function it_belongs_to_a_project(){
        $comment = factory(Comment::class)->create();
        $this->assertInstanceOf(Project::class, $comment->project);
    }
    /**@test */
   function it_has_a_path(){
       $comment = factory(Comment::class)->create();
       $this->assertEquals('/projects' . $comment->project->id . '/comments/' . $comment->id ,$comment->path());
   }
}
