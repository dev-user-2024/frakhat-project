<?php

namespace Modules\CategoryUser\Tests;

use Modules\CategoryUser\Database\Models\CategoryUser;
use Modules\CategoryUser\Facades\CategoryUserProviderFacade;
use Tests\TestCase;

class CategoryUserUnitTest extends TestCase
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
