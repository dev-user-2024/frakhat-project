<?php

namespace Modules\UserDetail\Tests;

use Modules\UserDetail\Database\Models\UserDetail;
use Modules\UserDetail\Facades\UserDetailProviderFacade;
use Tests\TestCase;

class UserDetailUnitTest extends TestCase
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
