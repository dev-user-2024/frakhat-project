<?php

use Modules\Tag\Database\TagStore;
use Tests\TestCase;

class TagFeatureTest extends TestCase
{
    public function testCategoryFormIsAuthenticated()
    {
        $response = $this->get(route('tag.create', ['type'=> 'news']));
        $response->assertRedirect('/login');

        $response = $this->post(route('tag.store'));
        $response->assertRedirect('/login');
    }

    public function testValidateCategoryForms()
    {
//        $this->withoutExceptionHandling();
        $data = [
            'title' => 'test',
            'parent_id' => 0,
            'tagable_type' => 'App/Models/news',
            'user_id' => 1,
            'slug' => 'test'
        ];
        $response = $this->post(route('tag.store'), $data);
        $this->assertEquals(CategoryStore::countCategory() , 1);

    }
}
