<?php

namespace Modules\Category\Tests;

use Modules\Category\Database\Models\Category;
use Modules\Category\Facades\CategoryProviderFacade;
use Tests\TestCase;
use App\HtmlyResponses;


class CategoryUnitTest extends TestCase
{
    public function testDeleteCategory()
    {
        $categoryId = 1;

        // Mock the CategoryProviderFacade::getCategoryByid method
        $category = 'Mocked Category';
        CategoryProviderFacade::shouldReceive('getCategoryByid')
            ->once()
            ->with($categoryId)
            ->andReturn($category);

        // Mock the CategoryStore::destroy method
        $status = 'success';
        CategoryStore::shouldReceive('destroy')
            ->once()
            ->with($category)
            ->andReturn($status);

        // Call the delete method
        $controller = new CategoryController();
        $response = $controller->delete($categoryId);

        // Assert the response
        $this->assertEquals(HtmlyResponses::success(), $response);
    }
}
