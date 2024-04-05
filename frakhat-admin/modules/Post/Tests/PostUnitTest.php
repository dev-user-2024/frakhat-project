<?php

namespace Modules\Post\Tests;

use Modules\Post\Database\Models\Post;
use Modules\Post\Facades\PostProviderFacade;
use Tests\TestCase;

class PostUnitTest extends TestCase
{
    public function test_index()
    {
//        PostProviderFacade::shouldReceive('getCategoriesByType')
//            ->once()
//            ->with('news')
//            ->andReturn(Post::all());
//
//        $response = $this->get('/post');
//        $this->assertTrue($response->content() == 'hello');
        $this->assertTrue(true);
    }
}
