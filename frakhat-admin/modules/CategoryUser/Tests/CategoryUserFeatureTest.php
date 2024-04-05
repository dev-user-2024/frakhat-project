<?php

use Modules\CategoryUser\Database\CategoryUserStore;
use Tests\TestCase;

class CategoryUserFeatureTest extends TestCase
{
    public function testCategoryFormIsAuthenticated()
    {
        $response = $this->get(route('categoryUser.create', ['type'=> 'news']));
        $response->assertRedirect('/login');

        $response = $this->post(route('categoryUser.store'));
        $response->assertRedirect('/login');
    }

    public function testValidateCategoryForms()
    {
//        $this->withoutExceptionHandling();
        $data = [
            'title' => 'test',
            'parent_id' => 0,
            'categoryUserable_type' => 'App/Models/news',
            'user_id' => 1,
            'slug' => 'test'
        ];
        $response = $this->post(route('categoryUser.store'), $data);
        $this->assertEquals(CategoryStore::countCategory() , 1);

    }
}
