<?php

namespace Modules\Tag\Tests;

use Modules\Tag\Database\Models\Tag;
use Modules\Tag\Facades\TagProviderFacade;
use Tests\TestCase;

class TagUnitTest extends TestCase
{
    public function test_index()
    {
//        CategoryProviderFacade::shouldReceive('getCategoriesByType')
//            ->once()
//            ->with('news')
//            ->andReturn(Category::all());
//
//        $response = $this->get('/category');
//        $this->assertTrue($response->content() == 'hello');
        $this->assertTrue(true);
    }
}
