<?php

use Modules\Category\Database\CategoryStore;
use Tests\TestCase;
use App\HtmlyResponses;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function testDeleteCategory()
    {
        // Create a category in the database
        $category = factory(Category::class)->create();

        // Call the delete method with the category ID
        $response = $this->delete('/categories/'.$category->id);

        // Assert that the category was deleted successfully
        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);
    }
}
