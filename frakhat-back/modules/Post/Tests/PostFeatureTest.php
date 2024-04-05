<?php

use Modules\Category\Database\CategoryStore;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{
    public function testCategoryFormIsAuthenticated()
    {
        $response = $this->get(route('post.create', ['type'=> 'news']));
        $response->assertRedirect('/login');

        $response = $this->post(route('post.store'));
        $response->assertRedirect('/login');
    }

    public function testValidateCategoryForms()
    {
//        $this->withoutExceptionHandling();
        $data = [
            'title' => 'test',
            'parent_id' => 0,
            'postable_type' => 'App/Models/news',
            'user_id' => 1,
            'slug' => 'test'
        ];
        $response = $this->post(route('post.store'), $data);
        $this->assertEquals(CategoryStore::countCategory() , 1);

    }
}
